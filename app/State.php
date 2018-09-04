<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class State extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Order', 'state_id');
    }

    public function deliveryPersons()
    {
        return $this->hasMany('App\DeliveryPerson','state_id');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function stock()
    {
        return $this->hasMany('App\Stock');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function inventory()
    {   
        return $this->hasMany('App\InventoryState');
    }

    public function scopePending($query,$id)
    {   
        return $this->orders()->where('delivery_person_id','>',0)->where('delivered',false);
    }

    public function scopeDelivered($query,$id)
    {   
        return $this->orders()->where('delivered',true)->where('created_at','>', \Carbon\Carbon::today()->subDays(30));
    }
}
