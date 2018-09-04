<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderByController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function urgentOrders()
    {
    	$orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
    		->where('urgent', true)
    		->orderBy('created_at', 'DESC')
    		->simplePaginate(20);

    	return view('orders.index')
    		->with('orders', $orders)
    		->with('heading', 'Urgent Orders');
    }

    public function unconfirmedOrders()
    {
    	$orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
    		->where('confirmed', false)
    		->orderBy('created_at', 'DESC')
    		->simplePaginate(20);

    	return view('orders.index')
    		->with('orders', $orders)
    		->with('heading', 'Unconfirmed Orders');
    }

    public function undeliveredOrders()
    {
    	$orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
    		->where('delivered', false)
    		->orderBy('created_at', 'DESC')
    		->simplePaginate(20);

    	return view('orders.index')
    		->with('orders', $orders)
    		->with('heading', 'Undelivered Orders');
    }

    public function confirmedOrders()
    {
    	$orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
    		->where('confirmed', true)
    		->orderBy('created_at', 'DESC')
    		->simplePaginate(20);

    	return view('orders.index')
    		->with('orders', $orders)
    		->with('heading', 'Confirmed Orders');
    }

    public function deliveredOrders()
    {
    	$orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
    		->where('delivered', true)
    		->orderBy('created_at', 'DESC')
    		->simplePaginate(20);

    	return view('orders.index')
    		->with('orders', $orders)
    		->with('heading', 'Delivered Orders');
    }

    public function noturgentOrders()
    {
    	$orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
    		->where('urgent', false)
    		->orderBy('created_at', 'DESC')
    		->simplePaginate(20);

    	return view('orders.index')
    		->with('orders', $orders)
    		->with('heading', 'Not Urgent Orders');
    }
}
