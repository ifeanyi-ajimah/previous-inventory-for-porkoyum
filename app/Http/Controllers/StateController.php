<?php

namespace App\Http\Controllers;

use App\State;
use App\Order;
use App\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::with('orders')->get();

        return view('states.index',[
            'states' => $states,
            'regions' => Region::all()
        ]);
    }

    public function orders(State $state)
    {
        $orders = $state->orders()
            ->with('customer', 'product', 'state', 'commsexec', 'user')
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(30);

        return view('orders.index', compact('orders'))
            ->with('heading', $state->name);
    }

    public function states(Request $request)
    {
        if ($request->has('date')) {
            $todayOrders = DB::table('orders')
                ->select('state_id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
                ->groupBy('state_id')
                ->whereDate('created_at', $request->date)
                ->get();
        } else {
            $todayOrders = DB::table('orders')
                ->select('state_id', DB::raw('SUM(value) as total_sales, COUNT(id) as orders_count'))
                ->groupBy('state_id')
                ->whereDate('created_at', ">", Carbon::today()->subDays(30))
                ->get();
        }

        $states = State::all();
        $sta = [];
        foreach ($states as $state) {
            $sta[$state->id] = $state->name;
        }

        return view('states.state')
            ->with('todayOrders', $todayOrders)
            ->with('state', $sta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('states.create');
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
            'name' => 'unique:states,name',
            'region' => 'required|integer'
        ]);

        $state = new State();

        $state->name = $request->name;

        $state->region_id = $request->region;
        if($state->save())
        {
            event(new \App\Events\CreateState($state));
        }
        
        $state->save();

        Session::flash('success', 'Region saved');

        return redirect()->route('states.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::find($id);
        return view('states.edit',[
            'state' => $state,
            'regions' => Region::all()
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
            'name' => 'unique:states,name,'.$id,
            'region' => 'required'
        ]);

        $state = State::find($id);

        $name = $state->name;
        $state->name = $request->name;

        $state->region_id = $request->region;
        if($state->save())
        {
            event(new \App\Events\UpdateState($state->name));
        }


        Session::flash('success', 'Region updated');

        return redirect()->route('states.index');
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
