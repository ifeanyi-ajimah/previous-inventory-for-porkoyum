<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\CommsExec;
use App\ProductCategory;
use Auth;

class CommsExecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        $commsexec = CommsExec::where('user_id',Auth::id())->first();

        if(!$commsexec){
            $pending = null;
            $cancelled = null;
            $delivered = null;
        }
        else {
            $pending    = $commsexec->orders()->where('delivered',false)->where('cancelled',false);
            $cancelled  = $commsexec->orders()->where('cancelled',true);
            $delivered  = $commsexec->orders()->where('delivered',true);
        }
        
        return view('commsexecs.index',[
            'pendingOrders'         => $pending,
            'cancelledOrders'       => $cancelled,
            'deliveredOrders'       => $delivered
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commsexecs = CommsExec::with('productcat', 'orders')->orderBy('created_at', 'DESC')->simplePaginate(20);
        return view('commsexecs.all',[
            'commsexecs' => $commsexecs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = ProductCategory::all();
        $users = \App\User::with(['roles' => function ($q) { $q->where('name', 'comms'); }])->get();
        $users = $users->filter( function($user){ 
            if($user->commsProfile){
                return false;
            }
            return count($user->roles); 
        });

        return view('commsexecs.create', [
            'product_categories'    => $product_categories,
            'users'                 => $users->filter( function($user){ return count($user->roles); })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'user_id' => 'required|integer',
            'productcategories_id' => 'required|integer'
        ]);

        $comms = new CommsExec;
        $comms->user_id = $request->user_id;
        $comms->productcategories_id = $request->productcategories_id;

        $comms->save();

        Session::flash('success', 'Comms Rep successfully attached');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commsExec = CommsExec::find($id);

        // CommsExec $commsExec
        $commsExecOrders = $commsExec->orders()->with('product')->get();

        $product_cats = ProductCategory::all();
        $prod_cat = [];
        foreach ($product_cats as $product_cat) {
            $prod_cat[$product_cat->id] = $product_cat->category_name;
        }

        return view('commsexecs.show',[
            'commsExec' => $commsExec,
            'commsExecOrders' => $commsExecOrders,
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
        $commsexec = CommsExec::find($id);
        $product_categories = ProductCategory::all();
        $pro_cats = [];
        foreach ($product_categories as $product_category) {
            $pro_cats[$product_category->id] = $product_category->category_name;
        }

        // return the view and pass in the var we previously created
        return view('commsexecs.edit',[
            'commsexec' => $commsexec,
            'product_categories' => $product_categories,
            'categories' => $pro_cats
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
            'name' => 'string',
            'productcategories_id' => 'integer'
        ]);

        $commsexec = CommsExec::find($id);

        $oldname = $commsexec->fullname;

        $commsexec->user->name = $request->fullname;
        $commsexec->user->save();

        $commsexec->productcategories_id = $request->productcategories_id;

        $commsexec->save();

        Session::flash('success', $commsexec->fullname . ' successfully Updated');

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
        $commsexec = CommsExec::find($id);

        $name = $commsexec->fullname;

        $commsexec->delete();

        Session::flash('success', 'Comms Exec successfully delete');

        return back();
    }
}
