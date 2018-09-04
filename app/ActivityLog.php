<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $guarded = [];

    public function user(){
    	return $this->belongsTO('App\User', 'user_id');
    }
}
