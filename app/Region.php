<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regions";

    protected $guarded = [];

    public function states(){
    	return $this->hasMany('App\State');
    }

    public function shipment(){
    	return $this->hasMany('App\Shipment');
    }
}
