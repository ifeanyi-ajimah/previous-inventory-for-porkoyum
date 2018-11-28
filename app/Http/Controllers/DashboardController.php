<?php

namespace App\Http\Controllers;

use App\CommsExec;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\Product;
use App\State;
//use App\ProductCategory;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $fromDate = Carbon::now()->subDays(7); // week old results:
        $tillDate = Carbon::now(); // year old results:

        $comms = DB::table('orders')
            ->select('comms_rep_id as id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('comms_rep_id')
            ->whereDate('created_at', Carbon::today())
            ->get();

        $commsYesterday = DB::table('orders')
            ->select('comms_rep_id as id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('comms_rep_id')
            ->whereDate('created_at', Carbon::yesterday())
            ->take(5)
            ->get();

        $commsWeek = DB::table('orders')
            ->select('comms_rep_id as id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('comms_rep_id')
            ->whereBetween(DB::raw('date(created_at)'), [$fromDate, $tillDate])
            ->take(5)
            ->get();

        $commsMonth = DB::table('orders')
            ->select('comms_rep_id as id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('comms_rep_id')
            ->whereDate('created_at', '>=', Carbon::now()->subMonth())
            ->take(5)
            ->get();

        $commsYear = DB::table('orders')
            ->select('comms_rep_id as id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('comms_rep_id')
            ->whereDate('created_at', '>=', Carbon::now()->subYear())
            ->take(5)
            ->get();

        //$products = Product::all();
        $pcs = [];
        $img = [];
        $dc = [];
        // foreach ($products as $aProduct) {
        //     $pcs[$aProduct->id] = $aProduct->category_name;
        //     $img[$aProduct->id] = $aProduct->image;
        //     $dc[$aProduct->id] = $aProduct->dashboard_color;
        // }

        $usernames = User::all();
        $users = [];
        foreach ($usernames as $username) {
            $users[$username->id] = $username->name;
        }

        $commsexecs = CommsExec::all();
        $commsrep = [];
        foreach ($commsexecs as $commsexec) {
            $commsrep[$commsexec->id] = $commsexec->fullname;
        }

        $comms = $comms->reject(function($person){
            return is_null($person->id);
        });
        $commsYesterday = $commsYesterday->reject(function($person){
            return is_null($person->id);
        });
        $commsWeek = $commsWeek->reject(function($person){
            return is_null($person->id);
        });
        $commsMonth = $commsMonth->reject(function($person){
            return is_null($person->id);
        });
        $commsYear = $commsYear->reject(function($person){
            return is_null($person->id);
        });

        $usersOrderstToday = DB::table('orders')
            ->select('created_by', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('created_by')
            ->whereDate('created_at', Carbon::today())
            ->take(5)
            ->get();

        $fromDate = Carbon::now()->subDays(7); // week old results:
        $tillDate = Carbon::now(); // year old results:

        $usersOrdersYesterday = DB::table('orders')
            ->select('created_by', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('created_by')
            ->whereDate('created_at', Carbon::yesterday())
            ->take(5)
            ->get();

        $usersOrdersWeek = DB::table('orders')
            ->select('created_by', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('created_by')
            ->whereBetween(DB::raw('date(created_at)'), [$fromDate, $tillDate])
            ->take(5)
            ->get();

        $usersOrdersMonth = DB::table('orders')
            ->select('created_by', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('created_by')
            ->whereDate('created_at', '>=', Carbon::now()->subMonth())
            ->take(5)
            ->get();

        $usersOrdersYear = DB::table('orders')
            ->select('created_by', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('created_by')
            ->whereDate('created_at', '>=', Carbon::now()->subYear())
            ->take(5)
            ->get();

    	$todayOrders = DB::table('orders')
            ->select('product_id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('product_id')
            ->whereDate('created_at', Carbon::today())
            ->get();

        $confirmedOrdersToday = \App\Order::confirmed(Carbon::today());

        $yesterdayOrders = DB::table('orders')
            ->select('product_id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('product_id')
            ->whereDate('created_at', Carbon::yesterday())
            ->get();

        $weekOrders = DB::table('orders')
            ->select('product_id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('product_id')
            ->whereBetween(DB::raw('date(created_at)'), [$fromDate, $tillDate] )
            ->get();

        $monthOrders = DB::table('orders')
            ->select('product_id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('product_id')
            ->whereDate('created_at', '>=', Carbon::now()->subMonth())
            ->get();

        $yearOrders = DB::table('orders')
            ->select('product_id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('product_id')
            ->whereDate('created_at', '>=', Carbon::now()->subYear())
            ->get();

        $monthOrders = $monthOrders->filter(function($order){
            if($order->product_id != null)
            {
                return $order;
            }
        })->values();

        $yearOrders = $yearOrders->filter(function($order){
            if($order->product_id != null)
            {
                return $order;
            }
        })->values();

		return view('dashboard.index')
            ->with('todayOrders', $todayOrders)
            ->with('confirmedOrdersToday', $confirmedOrdersToday)
            ->with('yesterdayOrders', $yesterdayOrders)
            ->with('weekOrders', $weekOrders)
            ->with('monthOrders', $monthOrders)
            ->with('yearOrders', $yearOrders)
            ->with('usersOrdersToday', $usersOrderstToday)
            ->with('usersOrdersYesterday', $usersOrdersYesterday)
            ->with('usersOrdersWeek', $usersOrdersWeek)
            ->with('usersOrdersMonth', $usersOrdersMonth)
            ->with('usersOrdersYear', $usersOrdersYear)
            ->with('pcs', $pcs)
            ->with('img', $img)
            ->with('dc', $dc)
            ->with('users', $users)
            ->with('comms', $comms)
            ->with('commsYesterday', $commsYesterday)
            ->with('commsWeek', $commsWeek)
            ->with('commsMonth', $commsMonth)
            ->with('commsYear', $commsYear)
            ->with('commsrep', $commsrep);
    }


    public function searchBydate(Request $request)
    {
        if ($request->has('date')) {
            $chosenDate = $request->date;
        } else {
            $chosenDate = Carbon::today();
        }

        $orders = Order::whereDate('created_at', $chosenDate)->simplePaginate(15);

        return view('orders.index')
            ->with('orders', $orders)
            ->with('heading', 'Orders on ' . date('F nS, Y', strtotime($chosenDate)));
    }

    /**
     * This section is not ready. The view does not have enough data going to it yet
     *
     */

    public function dashboardByState(State $state)
    {
        //$products = Product::all();
        $pcs = [];
        // foreach ($products as $aProduct) {
        //     $pcs[$aProduct->id] = $aProduct->category_name;
        // }

        // $user_orders = User::has('orders');

        $orders = DB::table('orders')
            ->select('product_id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
            ->groupBy('product_id')
            // ->where('state_id', '=', $state_id)
            ->where('state_id', $state)
            ->whereDate('created_at', '2017-06-09')
            ->get();

        // dd($orders);

        return view('dashboard.index')
            ->with('orders', $orders)
            ->with('pcs', $pcs);
        // ->with('userorder', $user_orders);
    }


}
