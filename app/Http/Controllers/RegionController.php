<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Shipment;
use App\Stock;
use App\State;
use Session;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::with('states')->get();

        return view('regions.index',['regions' => $regions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::find($id);
        return view('regions.edit',['region' => $region]);
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
            'name' => 'unique:regions,name,'.$id
        ]);

        $region = Region::find($id);

        $region->name = $request->name;
        $region->save();

        Session::flash('success', 'Service Zone updated');

        return redirect()->route('region.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'unique:regions,name'
        ]);

    	$region = new Region;
    	$region->name = $request->name;
    	$region->save();

    	return back();
    }

    public function addShipment(Request $request)
    {
    	$this->validate(request(), [
            'region' => 'required|integer',
            'product' => 'required|integer',
            'intact' => 'required|integer',
            'damaged' => 'required|integer',
        ]);

        $lastShipment = Shipment::where('region_id', $request->region)->where('product_id', $request->product)->latest()->first();
    	$shipment = new Shipment;
    	$shipment->region_id 	= $request->region;
    	$shipment->product_id 	= $request->product;
    	$shipment->intact 		= $request->intact;
    	$shipment->damaged 		= $request->damaged;
        if($lastShipment)
        {
            $shipment->available    = $lastShipment->available + $request->intact;
            $lastShipment->available = 0;
            $lastShipment->save();
        }else 
        {
            $shipment->available = $request->intact;
        }
    	if($shipment->save())
    	{
    		if(strtolower($shipment->region->name) == "accra")
    		{
                $request->location = State::where('name','Accra')->pluck('id')->first();
    			$stock = StockController::storeShadow($request);
                StockController::receiveStock($stock);
    		}
    	}

    	return back();
    }

    public function editShipment(Request $request)
    {
        $this->validate(request(), [
            'region' => 'required|integer',
            'location' => 'required|integer',
            'product' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $stockChange = StockController::editShadow($request);

        $shipment = Shipment::where('region_id', $request->region)->where('product_id', $request->product)->latest()->first();
        
        $shipment->available += $stockChange;
        $shipment->save();

        return back();
    }

    public function updateShipment(Request $request)
    {
        $this->validate(request(), [
            'product' => 'required|integer',
            'intact' => 'required|integer',
            'damaged' => 'required|integer',
        ]);

        $lastShipment = Shipment::where('region_id', $request->region)->where('product_id', $request->product)->latest()->first();
        $shipment = new Shipment;
        $shipment->region_id    = $request->region;
        $shipment->product_id   = $request->product;
        $shipment->intact       = $request->intact;
        $shipment->damaged      = $request->damaged;
        if($lastShipment)
        {
            $shipment->available    = $lastShipment->available + $request->intact;
            $lastShipment->available = 0;
            $lastShipment->save();
        }else 
        {
            $shipment->available = $request->intact;
        }
        if($shipment->save())
        {
            if(strtolower($shipment->region->name) == "accra")
            {
                $request->location = State::where('name','Accra')->pluck('id')->first();
                $stock = StockController::storeShadow($request);
                StockController::receiveStock($stock);
            }
        }

        return back();
    }
}
