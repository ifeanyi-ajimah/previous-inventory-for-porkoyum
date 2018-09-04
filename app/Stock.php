<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
	protected $table = "stocks";
	protected $guarded = [];

    public function product()
    {
    	return $this->belongsTo('App\Product','product_id');
    }

    public function damaged($batch = null)
    {
    	if($batch)
		{
			return self::where('batch',$batch)->where('type','damaged')->get();
		}
    	return self::where('type','damaged')->get();
    }

    public function restock($batch = null)
    {	
    	if($batch)
		{
			return self::where('batch',$batch)->where('type','restock')->get();
		}
    	return self::where('type','restock')->get();
    }

    public function remove($batch = null)
    {
    	if($batch)
		{
			return self::where('batch',$batch)->where('type','remove')->get();
		}
    	return self::where('type','remove')->get();
    }
}
