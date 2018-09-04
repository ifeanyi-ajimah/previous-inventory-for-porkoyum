<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryPerson extends Model
{
    protected $table = 'delivery_people';
    protected $appends = ['state'];

    protected $fillable = [
        'display_name',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order', 'delivery_person_id');
    }

    public function getStateAttribute()
    {
    	return \App\State::find($this->state_id)->pluck('name')->first();
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function getFullnameAttribute($value)
    {
        return $this->user? $this->user->name : $value;
    }
}
