<?php

namespace App\Http\Controllers;

use App\CommsExec;
use App\Customer;
use App\DeliveryPerson;
use Illuminate\Http\Request;
use App\Order;
use App\Pseudo;
use App\State;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class OrderController extends Controller
{
    public function __construct()
    {

    }

    public function accountsView()
    {
        return view('accounts.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accounts()
    {
        $states  = State::all();
        $states  = $states->map(function($state){
            $data           = new State;
            $data->id       = $state->id;
            $data->name     = $state->name;
            $data->total    = $state->orders()->sum('value');
            $today          = $state->orders()->whereBetween('created_at', [Carbon::today(), Carbon::now()])->get();
            $yesterday      = $state->orders()->whereBetween('created_at', [Carbon::yesterday(),Carbon::today()])->get();
            $week           = $state->orders()->whereBetween('created_at', [Carbon::now()->subDays(9),Carbon::today()->subDays(2)])->get();
            $month          = $state->orders()->whereBetween('created_at', [Carbon::today()->subMonth(), Carbon::now()])->get();
            $year           = $state->orders()->whereBetween('created_at', [Carbon::today()->subYear(),Carbon::now()])->get();

            $data->orders['today'] = $today->map(function($order){
                $temp           = new Order;
                $temp->id       = $order->id;
                $temp->product  = $order->product->product_name;
                $temp->quantity = $order->quantity;
                $temp->value    = $order->value;
                return $temp;
            });
            $data->orders['yesterday'] = $yesterday->map(function($order){
                $temp           = new Order;
                $temp->id       = $order->id;
                $temp->product  = $order->product->product_name;
                $temp->quantity = $order->quantity;
                $temp->value    = $order->value;
                return $temp;
            });
            $data->orders['week'] = $week->map(function($order){
                $temp           = new Order;
                $temp->id       = $order->id;
                $temp->product  = $order->product->product_name;
                $temp->quantity = $order->quantity;
                $temp->value    = $order->value;
                return $temp;
            });
            $data->orders['month'] = $month->map(function($order){
                $temp           = new Order;
                $temp->id       = $order->id;
                $temp->product  = $order->product->product_name;
                $temp->quantity = $order->quantity;
                $temp->value    = $order->value;
                return $temp;
            });
            $data->orders['year'] = $year->map(function($order){
                $temp           = new Order;
                $temp->id       = $order->id;
                $temp->product  = $order->product->product_name;
                $temp->quantity = $order->quantity;
                $temp->value    = $order->value;
                return $temp;
            });
            return $data;
        });

        return response()->json([
            'data' => $states
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commsexec = CommsExec::where('user_id',Auth::id())->pluck('id')->first();
        if(Auth::user()->hasRole('comms'))
        {
            $orders = Order::where('comms_rep_id',$commsexec)->with('customer', 'product', 'state', 'commsexec', 'user')
                ->orderBy('created_at', 'DESC')
                ->simplePaginate(30);
        }
        else{
            $orders = Order::with('customer', 'product', 'state', 'commsexec', 'user')
                ->orderBy('created_at', 'DESC')
                ->simplePaginate(30);
        }
        return view('orders.index',[
            'orders' => $orders,
            'heading' => 'All Orders'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!CommsExec::where('user_id',Auth::id())->first() && !Auth::user()->hasRole('admin')) {
            return abort(403, "Your request is forbidden");
        }

        $customers = Customer::all();
        $products = Product::all();
        $states = State::all();
        $commsExecs = CommsExec::all();
        $deliveryPersons = DeliveryPerson::all();

        return view('orders.create')
            ->with('customers', $customers)
            ->with('products', $products)
            ->with('states', $states)
            ->with('commsexecs', $commsExecs)
            ->with('deliveryPersons', $deliveryPersons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!CommsExec::where('user_id',Auth::id())->first() && !Auth::user()->hasRole('admin')) {
            return abort(403, "Your request is forbidden");
        }

        $this->validate($request, Order::$rules, Order::$messages);

        $order = new Order();

        if(!is_numeric($request->customer_id))
        {
            $request->customer_id   = $this->_addUser($request);
        }
        $order->customer_id             = $request->customer_id;
        //$order->product_cat_id          = //$request->product_cat_id;
        $order->product_id              = $request->product_id;
        $order->quantity                = $request->quantity;
        $order->value                   = $request->value;
        $order->state_id                = $request->state_id;
        $order->verified                = true; //This should be removed when how others are verified is confirmed
        $order->comms_rep_id            = CommsExec::where('user_id',Auth::id())->pluck('id')->first();
        //$order->urgent                  = //$request->urgent;
        if(isset($request->expected_delivery_date)){
            $order->expected_delivery_date  = Carbon::createFromFormat('Y-m-d', $request->expected_delivery_date)->toDateTimeString();
        }

        if(Customer::find($request->customer_id)->address !== $request->delivery_address)
        {
            $order->delivery_address    = $request->delivery_address;
        }
        $order->created_by              = Auth::id();

        if($order->save())
        {
            event(new \App\Events\CreateOrder($order));
        }

        Session::flash('success', 'Order Successful');

        return redirect('/dashboard');
    }

    public function apiStore(Request $request)
    {
        dd($request->all());
        $pseudo = new Pseudo();
        $pseudo->payload = json_encode($request->all());
        $pseudo->save();
        return response()->json(['message' => 'Order created'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order::with('deliveryperson', 'commsexec', 'user', 'product', 'customer');

        return view('orders.show',[
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $product_cat = $order->product->product_cat;

        $commsexecs = $product_cat->comms_execs;
        $comms = [];
        foreach ($commsexecs as $commsexec) {
            $comms[$commsexec->id] = $commsexec->display_name;
        }

        $states = State::all();
        $sta = [];
        foreach ($states as $state) {
            $sta[$state->id] = $state->name;
        }

        $deliveryPersons = DeliveryPerson::all();
        $dps = [];
        foreach ($deliveryPersons as $deliveryPerson) {
            $dps[$deliveryPerson->id] = $deliveryPerson->fullname;
        }

        return view('orders.edit',[
            'order' => $order,
            'states' => $sta,
            'comms' => $comms,
            'dps' => $dps
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Order $order)
    {
        // dd($request->all());

        $this->validate($request, Order::$edit_rules, Order::$messages);

        $data = $request->all();

        $product = $order->product->product_name;
        $customer = $order->customer->name." with phone: ".$order->customer->phone_no;
        if($order->update($data))
        {
            event(new \App\Events\UpdateOrder($product, $customer));
        }

        Session::flash('success', 'Order updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $product = $order->product->product_name;
        $customer = $order->customer->name." with phone: ".$order->customer->phone_no;

        if($order->delete())
        {
            event(new \App\Events\DeleteOrder($product, $customer));
        }

        Session::flash('success', 'Order deleted');

        return back();
    }


    public function deliverOrder(Request $request, $id)
    {
        $order = Order::find($id);
        if(!self::_changeOrderStatus($order)) return abort(405,"There is not enough inventory to make the request");
        $order->delivered = true;
        $order->is_mobile_money = $request->payment_type;
        $order->save();
        return back();
    }

    public function confirmDelivery($id)
    {
        $order = Order::find($id);
        $order->confirmed = true;
        $order->save();
        return back();
    }

    public function cancelOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->cancelled = true;
        $order->comment = $request->comment;
        $order->save();
        return back();
    }

    public function commentOnOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->comment = $request->comment;
        $order->save();
        return back();
    }

    public function verifyOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->verified = true;
        $order->comment = $request->comment;
        $order->save();
        return back();
    }

    public function confirmCancellation(Request $request, $id)
    {
        $order = Order::find($id);
        $inventory = $order->product->inventory()->where('state_id', $order->state_id)->first();
        $inventory->quantity = $inventory->quantity + $order->quantity;
        if($inventory->save())
        {
            $order->product->stock()->create([
                'state_id' => $order->state_id,
                'quantity' => $order->quantity,
                'damaged' => 0,
            ]);
        }
        $order->confirmed = true;
        $order->save();
        return back();
    }

    private static function _changeOrderStatus($order){
        $availableStock = $order->product->inventory()->where('state_id', $order->state_id)->first();
        if($availableStock->quantity > $order->quantity){
            // $order->product->stock()->create([
            //     'state_id' => $order->state_id,
            //     'quantity' => -($order->quantity),
            //     'damaged' => 0,
            // ]);
            $availableStock->quantity = $availableStock->quantity - $order->quantity;
            $availableStock->save();
        }
        else {
            return false;
        }
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function autoDoctor(Request $request)
    {
        $this->validate($request, [
            'value'     => 'required',
            'quantity'  => 'required'
        ]);

        $order                      = new Order();

        $product                    = Product::where('product_name','OBD AFRICA')->first();
        $customer_id                = $this->_addUser($request);
        if($customer_id){
            $order->customer_id     = $customer_id;
        }
        else {
            return response()->json(['message' => 'User information could not be saved'],400);
        }
        $order->product_cat_id      = $product->product_cat->id;
        $order->product_id          = $product->id;
        $order->quantity            = $request->quantity;
        $order->value               = $request->value;
        $order->state_id            = State::where('name','Accra')->pluck('id')->first();
        $order->delivery_address    = $request->delivery_address;

        $order->created_by          = 1;

        if($order->save())
        {
            return $order;
        }
        return response()->json(['message' => 'Order could not be created'],400);
    }

    public function getAutoDoctor()
    {
        $product        = Product::where('product_name','Auto Doctor')->first();

        $orders         = Order::where('comms_rep_id',null)->where('product_id',$product->id)->with('customer')
                            ->orderBy('created_at', 'ASC')
                            ->simplePaginate(20);

        return view('orders.autodoctor',[
            'orders'    => $orders,
            'heading'   => 'All Auto Doctor Orders'
        ]);
    }

    public function takeAutoDoctorOrder(Order $order)
    {
        $comms = CommsExec::where('user_id',Auth::id())->pluck('id')->first();
        if($comms){
            $order->comms_rep_id = $comms;
            $order->save();
            return response()->json(['message' => "Successfully added!"],200);
        }
        return response()->json(['message' => "Bad request"],400);
    }

    /*
     * Does not receive data from controller. Is used internally by class
     */
    private function _addUser($request){
        $this->validate($request, [
            'customer_name' => 'required',
            'delivery_address' => 'required',
            'customer_phone' => 'required | unique:customers,phone_no'
        ]);

        $customer = Customer::firstOrNew(
            ['phone_no' => $request->customer_phone],
            [
                'name'     => $request->customer_name,
                'address'  => $request->delivery_address
            ]
        );

        if(!$customer->id)
        {
            $customer->save();
            $customer->url = url("/customers")."/".$customer->id;
            $customer->save();
        }

        return $customer->id;
    }

    /****************************** For APIs ******************************/

    /**
     * Add Delivery Person.
     *
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function addDeliveryPerson(Request $request, $id)
    {
        $order = Order::find($id);
        $availableStock = $order->product->inventory()->where('state_id', $order->state_id)->first();

        if($order->delivery_person_id){
            $order->deliveryperson()->associate(DeliveryPerson::find($request->delivery_person));
        }else if($availableStock && ($availableStock->quantity > $order->product_quantity)){
            $order->deliveryperson()->associate(DeliveryPerson::find($request->delivery_person));
            $order->save();
            Session::flash('success', 'Delivery agent has been added');

            return back();
        }

        Session::flash('warning', 'Insufficient items in stock for dispatch');
        return back();
    }

    public function assignDeliveryPerson(Request $request, $id)
    {
        $order = Order::find($id);
        $availableStock = $order->product->inventory()->where('state_id', $order->state_id)->first();

        if($order->delivery_person_id){
            $order->deliveryperson()->associate(DeliveryPerson::find($request->delivery_person));
        }else if($availableStock && $availableStock->quantity > $order->product_quantity){
            $order->deliveryperson()->associate(DeliveryPerson::find($request->delivery_person));
            $order->save();
            return response()->json(['message' => "Delivery agent has been added"],201);
        }
        return response()->json(['message' => "Insufficient items in stock for dispatch."],400);
    }

    public function statePendingOrders()
    {
        $products = Product::all(['id']);

        $orders = array_map(function($prod){

            $accra = State::where('name','Accra')->pluck('id')->first();
            $product = Product::find($prod['id']);
            $sortedState = [];
            $states = State::where('name','!=','Accra')->get();
            foreach ($states as $state) {
                $sortedState[$state->id]['id'] = $state->id;
                $sortedState[$state->id]['name'] = $state->name;
                $sortedState[$state->id]['units'] = $state->orders()->where('product_id',$product->id)->where('delivery_person_id','>',0)->where('delivered',false)->sum('quantity');
            }

            $temp['id'] = $product->id;
            $temp['name'] = $product->product_name;
            $temp['units'] = $product->pending($accra)->sum('quantity');
            $temp['items'] = array_filter($sortedState, function($item){
                return $item['units'] > 0;
            });

            return $temp;

        }, $products->toArray());
        $orders = array_filter($orders, function($item){
            return $item['units'] > 0;
        });
        return response()->json($orders,200);
    }

    public function stateDeliveredOrders()
    {
        $products = Product::all(['id']);

        $orders = array_map(function($prod){

            $accra = State::where('name','Accra')->pluck('id')->first();
            $product = Product::find($prod['id']);
            $sortedState = [];
            $states = State::where('id','!=',$accra)->get();
            foreach ($states as $state) {
                $sortedState[$state->id]['id'] = $state->id;
                $sortedState[$state->id]['name'] = $state->name;
                $sortedState[$state->id]['units'] = $state->orders()->where('product_id',$product->id)->where('delivered',true)->sum('value');
            }

            $temp['id'] = $product->id;
            $temp['name'] = $product->product_name;
            $temp['units'] = $product->fulfilled($accra)->sum('value');
            $temp['items'] = array_filter($sortedState, function($item){
                return $item['units'] > 0;
            });

            return $temp;

        }, $products->toArray());
        $orders = array_filter($orders, function($item){
            return $item['units'] > 0;
        });
        return response()->json($orders,200);
    }

    public function allDeliveries()
    {
        $orders = Order::where('delivered',true)->with('deliveryperson','state')->orderBy('confirmed', 'DESC')->get();

        return view('deliverypersons.deliveries',[
            'orders' => $orders
        ]);
    }


    public function markAsDelivered($id)
    {
        $order = Order::find($id);
        if(!self::_changeOrderStatus($order)) {
            return response()->json([
                'message' => "There is not enough inventory to make the fulfill"
            ],405);
        }

        $order->delivered = true;
        $order->save();
        return response()->json([
                'message' => "Order Marked as Delivered"
            ],200);
    }

    public function markAsPending($id)
    {
        $order = Order::find($id);
        $order->confirmed = false;
        $order->delivered = false;
        if($order->save())
        {
            return response()->json([
                'message' => "Order Marked as pending"
            ],200);
        }
        return response()->json([
                'message' => "This order cannot be marked as pending"
            ],403);
    }
}
