<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function product_cat()
    {
        return $this->belongsTo('App\ProductCategory', 'product_category_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function stock()
    {
    	return $this->hasMany('App\Stock');
    }

    public function inventory()
    {
        return $this->hasMany('App\InventoryState');
    }
   
    public function shipment()
    {
        return $this->hasMany('App\Shipment');
    }

    public function regionalInventory($location)
    {
        return $this->shipment()->where('region_id',$location);
    }

    public function inventoryAll($location)
    {	
    	return $this->inventory()->where('state_id',"!=",$location);	
    }

    public function stateInventory($location)
    {	
    	return $this->inventory()->where('state_id',$location)->first();	
    }

    public function transitAccra($id)
    {	
    	return $this->orders()->where('state_id',$id)->where('delivery_person_id',">",0)->where('confirmed',false)->where('cancelled',false);
    }

    public function transit($id)
    {	
    	return $this->stock()->where('state_id',"!=",$id)->where('received',false);
    }

    public function pendingAccra($id)
    {	
    	return $this->orders()->where('state_id',$id)->where('delivery_person_id','>',0)->where('delivered',false)->where('cancelled',false);
    }

    public function pending($id)
    {	
    	return $this->orders()->where('state_id',"!=",$id)->where('delivery_person_id','>',0)->where('delivered',false)->where('cancelled',false);
    }

    public function fulfilledAccra($id)
    {	
    	return $this->orders()->where('state_id',$id)->where('delivered',true)->where('confirmed',true);
    }

    public function fulfilled($id)
    {	
    	return $this->orders()->where('state_id',"!=",$id)->where('delivered',true)->where('confirmed',true);
    }
}
