<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StateEventSubscriber
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
            'summary'   => "created a state record ".$event->model->name,
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
            'summary'   => "updated the state ".$event->name,
            'action'    => 'update'
        ]);
    }

    /**
     * Hanlde deletion events.
     */
    public function onDelete($event)
    {
        
    }
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\CreateState',
            'App\Listeners\StateEventSubscriber@onCreate'
        );

        $events->listen(
            'App\Events\DeleteState',
            'App\Listeners\StateEventSubscriber@onDelete'
        );

        $events->listen(
            'App\Events\UpdateState',
            'App\Listeners\StateEventSubscriber@onUpdate'
        );
    }
}
