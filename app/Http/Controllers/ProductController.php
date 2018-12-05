<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\CommsExec;
use App\Order;
use Illuminate\Support\Facades\Session;
use Auth;

class ProductController extends Controller
{
    Public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }


    public function edit($product_id)
    {
        $product = Product::find($product_id);
        return view('products.edit',compact('product'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required | unique:products,product_name',
            'price' => 'required |integer',
            'description' =>'required',
            'image'=>'image|mimes:png,jpg,jpeg,max:10000',
        ]);

        if($request->hasFile('image')){
        $imageName = $request->image->getClientOriginalName();
        $request ->image->move('images',$imageName);
        /*$file_path = $request->image->getPathName();
        return $file_path;*/
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->dashboard_color = $request->dashboard_color;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->save();


        }

        Session::flash('success', 'Product successfully added');

        return redirect()->route('products.index');
    }


    public function update(Request $request, $id)
    {   //dd($request->all());
        $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required |integer',
            'description' =>'required',
            'image'=>'required',
        ]);

        if($request->hasFile('image')){
        $imageName = $request->image->getClientOriginalName();
        $request->image->move('images',$imageName);

        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->dashboard_color = $request->dashboard_color;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->save();
        }

        Session::flash('success', 'Product successfully updated');

        return redirect()->route('products.index');
    }



    public function destroy( $id){
        Product::find($id)->delete();

        Session::flash('success','Product deleted');
        return redirect()->route('products.index');
    }


   





    public function ordersbyproduct($product_name)
    {
        $id = Product::where('product_name', $product_name)->pluck('id');

        if (request()->has('date')) {

            $chosenDate = request('date');

            $orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
                ->where('id', $id)
                ->whereDate('created_at', Carbon::parse($chosenDate))
                ->orderBy('created_at', 'DESC')
                ->simplePaginate(20);
        } else {
            $orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
                ->where('id', $id)
                ->orderBy('created_at', 'DESC')
                ->simplePaginate(20);
        }

        return view('orders.index')
            ->with('orders', $orders)
            ->with('heading', $product_name);
    }

}
