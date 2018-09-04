<?php

namespace App\Listeners;

use App\Events\AddPermissionToRole;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddedPermissionToRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddPermissionToRole  $event
     * @return void
     */
    public function handle(AddPermissionToRole $event)
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
            'summary'   => "added the ".$event->permission->name." permission to role ".$event->role->name,
            'action'    => 'add'
        ]);
    }
}
