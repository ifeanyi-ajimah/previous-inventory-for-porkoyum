<?php

namespace App\Listeners;

use App\Events\CreateCommsExec;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommsExecsEventSubscriber
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
            'summary'   => "created a new comms executive profile for ".$event->model->fullname,
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
            'summary'   => "updated ".$event->old."'s profile",
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
            'summary'   => "deleted ".$event->name."'s profile",
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
            'App\Events\CreateCommsExecs',
            'App\Listeners\CommsExecsEventSubscriber@onCreate'
        );

        $events->listen(
            'App\Events\DeleteCommsExecs',
            'App\Listeners\CommsExecsEventSubscriber@onDelete'
        );

        $events->listen(
            'App\Events\UpdateCommsExecs',
            'App\Listeners\CommsExecsEventSubscriber@onUpdate'
        );
    }
}
