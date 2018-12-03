<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::withCount('orders')->get();

        return view('customers.index',[
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone_no' => 'required | unique:customers,phone_no'
        ]);

        $customer = new Customer();

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone_no = $request->phone_no;
        $customer->url = url("/customers")."/".$customer->id;

        if($customer->save())
        {
            event(new \App\Events\CreateCustomer($customer));
        }

        Session::flash('success', 'Customer Successfully Saved');

        return back();
    }

    public function storeCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone_no' => 'required | unique:customers,phone_no'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $create = Customer::create($request->all());
        if($create)
        {
            event(new \App\Events\CreateCustomer($create));
        }
        return response()->json($create);
    }

    public function getOrders($id)
    {
        $orders = Order::customerOrders($id)->get();

        return $orders;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customerOrders = $customer->orders()->with('product')->get();

        $products = Product::all();
        $prod_cat = [];
        foreach ($products as $product) {
            $prod_cat[$product->id] = $product->product_name;
        }

        return view('customers.show', [
            'customer' => $customer,
            'customerOrders' => $customerOrders,
            'product_cat' => $prod_cat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit',[
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone_no' => 'required | digits:11 | unique:customers,phone_no,'.$id
        ]);

        $customer = Customer::find($id);

        $oldname = $customer->name;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone_no = $request->phone_no;

        if($customer->save()){
            event(new \App\Events\UpdateCustomer($oldname));
        }

        Session::flash('success', 'Customer Successfully Updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function find(Customer $customer)
    {
        return response()->json($customer->toArray(),200);
    }

    public function findall(Request $request)
    {
        // $customer = $request->get('product_cat_id');

        // $customers = Customer::where('name', 'LIKE', '%'.$customer.'%')
        //     ->orderBy('name', 'ASC')
        //     ->get();

        $customer = Customers::all();

        return response()->json($customers,200);
    }

    public function search(Request $request)
    {
        return Customer::search($request->get('customername'))->get();
    }
}
