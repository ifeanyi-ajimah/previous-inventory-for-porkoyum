<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CommsExec extends Model
{
    protected $table = 'comms_execs';
    protected $fillable = [
        'fullname',
        'display_name',
    ];


    public function orders()
    {
        return $this->hasMany('App\Order', 'comms_rep_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function getFullnameAttribute($value)
    {
        return $this->user? $this->user->name : $value;
    }

    public function getDisplayNameAttribute($value)
    {
        return $this->user? $this->user->name : $value;
    }
}
