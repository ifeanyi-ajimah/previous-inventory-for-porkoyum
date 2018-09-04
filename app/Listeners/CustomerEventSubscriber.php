<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerEventSubscriber
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
            'summary'   => "created a customer profile for ".$event->model->name,
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
            'summary'   => "updated ".$event->old."'s' profile",
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
            'App\Events\CreateCustomer',
            'App\Listeners\CustomerEventSubscriber@onCreate'
        );

        $events->listen(
            'App\Events\DeleteCustomer',
            'App\Listeners\CustomerEventSubscriber@onDelete'
        );

        $events->listen(
            'App\Events\UpdateCustomer',
            'App\Listeners\CustomerEventSubscriber@onUpdate'
        );
    }
}
