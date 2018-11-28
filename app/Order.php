<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\State;

class Order extends Model
{
    // use Searchable;

//    protected $dates = [
//        'created_at',
//        'updated_at',
//        'date_paid',
//        'deleted_at'
//    ];


    public function scopeCustomerOrders($query, $id)
    {
        return $query->where('customer_id', $id);
    }

    public function scopeConfirmed($query, $date)
    {
        return $query->whereDate('updated_at', $date)->where('confirmed', true)->count();
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function deliveryperson()
    {
        return $this->belongsTo('App\DeliveryPerson', 'delivery_person_id');
    }

    public function commsexec()
    {
        return $this->belongsTo('App\CommsExec', 'comms_rep_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }


    protected $fillable = [
        'customer_id', 
        'product_id', 
        'quantity', 
        'state_id', 
        'value',
        'urgency_status', 
        'comms_rep_id', 
        'confirmed_status',
        'delivery_status', 
        'delivery_person_id', 
        'amount_paid',
        'date_paid',
        'expected_delivery_date'
    ];

    public static $rules = [
        'customer_id' => 'required', 'product_cat_id' => 'required',
        'product_id' => 'required', 'quantity' => 'required',
        'state_id' => 'required', 'value' => 'required',
        'urgent' => 'required'
        // 'comms_rep_id' => 'required'
    ];

    public static $edit_rules = [
        'customer_id' => 'required', 
        'product_id' => 'required',
        'quantity' => 'required', 
        'state_id' => 'required',
        'value' => 'required'
    ];


    public static $messages = [
        'customer_id.required' => 'No Customer chosen',
        'product_cat_id.required' => 'Choose a Product Category',
        'product_id.required' => 'Choose a product',
        'quantity.required' => 'Enter quantity of product',
        'state_id.required' => 'Choose a state',
        'comms_rep_id.required' => 'Choose a comms rep for this order'
    ];
}
