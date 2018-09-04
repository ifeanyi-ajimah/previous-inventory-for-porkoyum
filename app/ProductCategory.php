<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['category_name', 'dashboard_color', 'image'];

    public function products()
    {
        return $this->hasMany('App\Product', 'product_category_id');
    }

    public function comms_execs()
    {
        return $this->hasMany('App\CommsExec', 'productcategories_id');
    }

    public function addCommsRep($body)
    {
        $this->comms_execs()->create(compact('body'));
    }

}
