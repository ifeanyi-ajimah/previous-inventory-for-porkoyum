<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Order;

class Customer extends Model
{
	use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'customers.name' => 10,
            'customers.phone_no' => 5,
            'customers.address' => 3,
        ]
    ];

    protected $fillable = [
        'name',
        'address',
        'phone_no'
    ];

    public function orders()
    {
        return $this->hasMany('App\Order', 'customer_id');
    }
}
