<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\State;
use App\Product;
use App\Order;
use App\Customer;
use App\DeliveryPerson;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->states = State::where('name',"!=",'Accra')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('inventory.index',[
            'unverifiedOrders'  => Order::where('verified',false)->where('delivered',false)->where('cancelled',false),
            'pendingOrders'     => Order::where('verified',true)->where('delivered',false)->where('cancelled',false),
            'cancelledOrders'   => Order::where('cancelled',true),
            'deliveredOrders'   => Order::where('delivered',true)
        ]);
    }

    public function getStateOrders(Request $request,$id)
    {
        $orders = Order::where('state_id', $id)->where('verified',true)->where('delivered',false)->where('cancelled',false)->where('delivery_person_id',null)->get();

        $stateOrders = $orders->map(function($order){
        	$temp['id'] 		= $order->id;
        	$temp['product'] 	= $order->product->product_name;
        	$temp['quantity'] 	= $order->quantity;
        	$temp['value'] 		= $order->value;
        	$temp['address'] 	= $order->delivery_address ? $order->delivery_address : $order->customer->address;
        	$temp['status'] 	= $order->delivered == false? "pending" : "delivered";

        	return $temp;
        });
        return response()->json($stateOrders,200);
    }

    public function getStateWarehouse()
    {
        $states = $this->states;
    	$mapped = $states->map(function($state){
        	$temp['id'] 	= $state->id;
        	$temp['name'] 	= $state->name;
        	$temp['units'] 	= $state->inventory()->sum('quantity');
        	foreach ($state->inventory as $stock) {
        		$temp['items'][$stock->id]['id'] = $stock->id;
        		$temp['items'][$stock->id]['name'] = $stock->product->product_name;
        		$temp['items'][$stock->id]['units'] = $stock->quantity;
        	}

        	return $temp['units'] > 0? $temp : false;
        });
        $mapped = $mapped->reject(function($model){
            $check = $model == false? true : false;
            $check = empty($model['items']);
            return $check;
        });
        return response()->json($mapped,200);
    }

    public function getStatePending()
    {
        $states = $this->states;    	

        $mapped = $states->map(function($state){
            $temp['id']     = $state->id;
            $temp['name']   = $state->name;
            $temp['units']  = $state->stock()->sum('quantity');
            foreach ($state->stock as $stock) {
                if($stock->received) continue;
                $temp['items'][$stock->id]['id'] = $stock->id;
                $temp['items'][$stock->id]['name'] = $stock->product->product_name;
                $temp['items'][$stock->id]['units'] = $stock->quantity;
            }

            return $temp['units'] > 0? $temp : false;
        });
        $mapped = $mapped->reject(function($model){
            $check = $model == false? true : false;
            $check = empty($model['items']);
            return $check;
        });
        return response()->json($mapped,200);
    }

    public function getStates()
    {
    	$states = $this->states;

    	$mapped = $states->map(function($state){
        	$temp['id'] 		= $state->id;
        	$temp['name'] 		= $state->name;
        	$temp['units'] 	    = $state->orders()->where('verified',true)->where('delivered',false)->where('cancelled',false)->where('delivery_person_id',null)->sum('quantity');

        	return $temp['units'] > 0? $temp : false;
        });
        $mapped = $mapped->reject(function($model){
            return $model['units'] == false;
        });
        return response()->json($mapped,200);
    }

    public function getDeliveryPersons($state)
    {
        $persons = State::find($state)->deliveryPersons;
        return response()->json($persons->toArray(),200);
    }
}
