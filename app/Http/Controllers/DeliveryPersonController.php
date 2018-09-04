<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\DeliveryPerson;
use Auth;

class DeliveryPersonController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryPersons = DeliveryPerson::withCount('orders')->get();
        $users = \App\User::with(['roles' => function ($q) { $q->where('name', 'logistics'); }])->get();
        
        return view('deliverypersons.index',[
            'deliveryPersons' => $deliveryPersons,
            'states' => \App\State::all(),
            'users' => $users->filter( function($user){ return count($user->roles); })
        ]);
    }

    public function dashboard()
    {
        $dp = DeliveryPerson::where('user_id',Auth::id())->first();
        if(!$dp) 
        {
            $orders = null;
        }
        else {
            $orders = $dp->orders;
        }
        return view('deliverypersons.dashboard',[
            'orders' => $orders
        ]);
    }

    public function dashboardAdmin($id)
    {
        $orders = DeliveryPerson::find($id)->orders;
        return view('deliverypersons.admin',[
            'orders' => $orders,
            'users'  => \App\User::with(['roles' => function ($q) { $q->where('name', 'logistics'); } ])->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
           'user_id'   => 'required|integer',
           'state'     => 'required|integer'
        ]);

        $deliveryPerson = new DeliveryPerson;
        $deliveryPerson->user_id = $request->user_id;
        $deliveryPerson->state_id = $request->state;

        $deliveryPerson->save();
        

        Session::flash('success', 'Delivery Person Successfully created');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetchAll(Request $request)
    {
        return DeliveryPerson::where('state_id',$request->state)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deliveryPerson = DeliveryPerson::find($id);
        return view('deliverypersons.edit',[
            'deliveryPerson' => $deliveryPerson,
            'states' => \App\State::all()
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
            'fullname'  => 'string',
            'state'     => 'integer'
        ]);

        $deliveryPerson = DeliveryPerson::find($id);
        $oldname = $deliveryPerson->fullname;

        $deliveryPerson->user->name = $request->fullname;
        $deliveryPerson->user->save();
        $deliveryPerson->state_id = $request->state;
        $deliveryPerson->save();

        Session::flash('success', 'Delivery Person Successfully updated');

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
}
