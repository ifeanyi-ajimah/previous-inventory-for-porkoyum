<?php 
namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $fillable = [
        'name', 'display_name', 'description',
    ];

    protected $table = 'roles';

    protected $guarded = [];

    public function user()
    {
    	return $this->belongsToMany('App\User','role_user');
    }
}