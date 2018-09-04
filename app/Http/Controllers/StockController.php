<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\State;
use App\Product;
use App\Order;
use App\Region;
use App\InventoryState;
use App\Customer;
use App\DeliveryPerson;
use Session;
use Auth;

class StockController extends Controller
{
	public function dashboard()
	{
		$user = Auth::user();
		if($user->hasRole('inventory-accra'))
		{
			return self::accra();
		}
		return self::others();
	}

	public function accra()
	{
		$state = State::where('name','Accra')->first();
		$region = $state->region->id;
		return view('accra', [
			'products' 	=> Product::all(),
			'orders' 	=> Order::where('state_id',$state->id)->where('verified',true)->where('delivery_person_id',null)->get(),
			'state'		=> $state->id,
			'region'	=> $region,
			'logistics' => DeliveryPerson::where('state_id',$state->id)->get()
		]);
	}

	public function others()
	{
		$accra = State::where('name','Accra')->pluck('id')->first();
		$orders = Order::where('state_id','!=',$accra)->get();

		$region = Region::where('name','!=','Accra')->pluck('id')->first();

		$products = Product::all();

		$mapped = $products->map(function($product) use ($region){
			$regionalInventory = $product->regionalInventory($region)->latest()->first();
			if($regionalInventory){
				$product->available = $regionalInventory->available;
			}
			return $product;
		});

		$filtered = $mapped->filter(function($product){
			return $product->available;
		});

		return view('states', [
			'availableProducts' 	=> $filtered,
			'products' 	=> $products,
			'orders' 	=> $orders,
			'state' 	=> $accra,
			'states' 	=> State::where('id','!=',$accra)->get(),
			'region'	=> $region,
			'logistics' => DeliveryPerson::where('state_id','!=',$accra)->get()
		]);
	}
	
    public function store(Request $request)
    {
    	if(self::storeShadow($request)){
    		return back();
    	}
    	Session::flash('info', 'Not enough items to make this stocking');
		return back();
    }

    public static function storeShadow($request)
    {
    	$stock = new Stock;
    	$stock->product_id = $request->product;
    	$stock->quantity = $request->intact;
    	$stock->damaged = $request->damaged;
	    $stock->state_id = $request->location;
    	
    	$regionalShipment = $stock->product->regionalInventory($request->region)->latest()->first();
    	$oldStock = $regionalShipment->available;
		$regionalShipment->available = $regionalShipment->available - ($request->intact + $request->damaged);

		if($regionalShipment->available < 0){
			return false;
		}
		$regionalShipment->save();
		
	    $stock->save();
	    return $stock;
    }

    public static function editShadow($request)
    {
    	$inventory = InventoryState::where('product_id',$request->product)->where('state_id',$request->location)->first();
		// dd($stock->product->regionalInventory($request->region)->latest()->first());
    	$stockChange = $inventory->quantity - $request->quantity;
    	$inventory->quantity = $request->quantity;
	    $inventory->save();
	    
	    $stock = new Stock;
    	$stock->product_id = $request->product;
    	$stock->quantity = $stockChange;
    	$stock->damaged = 0;
	    $stock->state_id = $request->location;
	    $stock->save();

	    return $stockChange;
    }

    public static function shipment()
    {	
    	$user = DeliveryPerson::where('user_id',Auth::id())->first();
    	$shipments = Stock::where('state_id',$user->state_id)->where('received',false)->get();
    	return view('deliverypersons.shipment',[
    		'shipments' => $shipments
    	]);
    }

    public static function receiveStock(Stock $stock)
    {
    	if($stock->received) return $stock;
		$inventory = InventoryState::where('product_id',$stock->product_id)->where('state_id',$stock->state_id)->first();
    	if($inventory)
    	{
    		$inventory->quantity = $inventory->quantity + $stock->quantity;
    		$inventory->save();
    	}else
    	{
    		InventoryState::create([
    			'state_id' => $stock->state_id,
    			'product_id' => $stock->product_id,
    			'quantity' => $stock->quantity 
    		]);
    	}
    	$stock->received = true;
	    $stock->save();
	    return $stock;
    }

}
