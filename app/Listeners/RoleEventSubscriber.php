<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RoleEventSubscriber
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
     * Hanlde creation events.
     */
    public function onCreate($event)
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
            'summary'   => "created a new role ".$event->model->name,
            'action'    => 'create'
        ]);
    }

    /**
     * Hanlde update events.
     */
    public function onUpdate($event)
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
            'summary'   => "updated the role ".$event->name,
            'action'    => 'update'
        ]);
    }

    /**
     * Hanlde deletion events.
     */
    public function onDelete($event)
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
            'summary'   => "deleted the role ".$event->name,
            'action'    => 'delete'
        ]);
    }
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\CreateRole',
            'App\Listeners\RoleEventSubscriber@onCreate'
        );

        $events->listen(
            'App\Events\DeleteRole',
            'App\Listeners\RoleEventSubscriber@onDelete'
        );

        $events->listen(
            'App\Events\UpdateRole',
            'App\Listeners\RoleEventSubscriber@onUpdate'
        );
    }
}
