<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\CommsExec;
use App\ProductCategory;
use App\Order;
use Illuminate\Support\Facades\Session;
use Auth;

class ProductController extends Controller
{   
    public function store(Request $request, $procat_id)
    {
        $this->validate($request, [
            'product_name' => 'required | unique:products,product_name',
            'price' => 'required | integer',
        ]);

        $product = new Product();

        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');

        $product_cat = ProductCategory::find($procat_id);

        if($product_cat->products()->save($product))
        {
            event(new \App\Events\CreateProduct($product));
        }

        Session::flash('success', 'Product successfully added');

        return redirect()->route('productcat.show', $procat_id);
    }


    public function edit($product_id)
    {
        $product = Product::find($product_id);
        $product_cat_id = $product->product_cat->id;

        return view('products.edit')
            ->with('product', $product)
            ->with('product_cat_id', $product_cat_id);
    }

    public function destroy(Product $product){
        $copy = $product;
        if($product->delete())
        {
            event(new \App\Events\DeleteProduct($copy->name));
        }
        
        return response()->json(['message' =>$copy->product_name. "has been deleted"]);
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);

        $name = $product->product_name;

        $this->validate($request, [
            'product_name' => 'required | unique:products,product_name',
            'price' => 'required | integer',
        ]);

        $product_cat_id = $request->input('product_cat_id');

        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        if($product->save())
        {
            event(new \App\Events\UpdateProduct($name));
        }

        Session::flash('success', 'Product successfully updated');

        return redirect()->route('productcat.show', $product_cat_id);
    }

    public function ordersbyproduct($product_name)
    {
        $id = ProductCategory::where('category_name', $product_name)->pluck('id');

        if (request()->has('date')) {

            $chosenDate = request('date');

            $orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
                ->where('product_cat_id', $id)
                ->whereDate('created_at', Carbon::parse($chosenDate))
                ->orderBy('created_at', 'DESC')
                ->simplePaginate(20);
        } else {
            $orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
                ->where('product_cat_id', $id)
                ->orderBy('created_at', 'DESC')
                ->simplePaginate(20);
        }

        return view('orders.index')
            ->with('orders', $orders)
            ->with('heading', $product_name);
    }

}
