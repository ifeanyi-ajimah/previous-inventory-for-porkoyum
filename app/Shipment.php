<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table = "shipments";

    protected $guarded = [];

    public function region(){
    	return $this->belongsTo('App\Region');
    }
}
