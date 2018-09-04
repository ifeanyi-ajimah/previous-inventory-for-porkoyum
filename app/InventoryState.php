<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryState extends Model
{
    protected $table = "inventory_state";

    protected $fillable = [
    	'product_id',
    	'state_id',
    	'quantity'
    ];

    public function state()
    {
    	return $this->belongsTo('App\State');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
