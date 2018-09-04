<?php

namespace App\Http\Controllers;
use App\ProductCategory;
use App\Product;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class ProductCategoryController extends Controller
{   
    public function index()
    {
        $product_categories = ProductCategory::all();
        return view('products_category.index')
            ->with('product_categories', $product_categories);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'dashboard_color' => 'required',
            'image' => 'required | image',
        ]);

        $product_category = new ProductCategory();

        $product_category->category_name = $request->input('category_name');
        $product_category->dashboard_color = $request->input('dashboard_color');

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->save($location);

            $product_category->image = $filename;
        }

        if($product_category->save())
        {
            event(new \App\Events\CreateProductCategory($product_category));
        }

        Session::flash('success', 'Product Category successfully created');

        return redirect()->route('productcat.index');

    }


    public function show($id)
    {
        $product_category = ProductCategory::findOrFail($id);
        return view('products_category.show')
            ->with('product_category', $product_category);
    }


    public function update(Request $request, $id)
    {
        $product_category = ProductCategory::findOrFail($id);

        $this->validate($request, [
            'category_name' => 'required'
        ]);

        $values = $request->all();
        $name = $product_category->category_name;
        $product_category->fill($values);
        if ($request->hasFile('image')) {
            // add new image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $product_category->image;
            $product_category->image = $filename;
            \Storage::delete($oldFilename);
        }
        if($product_category->save())
        {
            event(new \App\Events\UpdateProductCategory($name));
        }

        Session::flash('success', 'Product Category successfully updated');

        return redirect()->route('productcat.show', $product_category->id);
    }

    public function destroy(ProductCategory $category)
    {
        $name = $category->category_name;
        $category->products()->delete();
        $category->comms_execs()->delete();
        if($category->delete()){
            event(new \App\Events\DeleteProductCategory($name));
        }

        Session::flash('success', 'The product category was successfully deleted');

        return redirect()->route('productcat.index');
    }

    public function commsReps(Request $request, $id)
    {
        $cat = ProductCategory::find($id);

        $comms_rep = $cat->comms_execs()->orderBy('display_name', 'ASC')->get();

        return response()->json($comms_rep, 200);
    }

    public function products(Request $request, $id)
    {
        $cat = ProductCategory::find($id);

        $products = $cat->products()->orderBy('product_name', 'ASC')->get();

        return response()->json($products,200);
    }

}
