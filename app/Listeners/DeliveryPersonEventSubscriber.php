<?php

namespace App\Listeners;

use App\Events\CreateCommsExec;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeliveryPersonEventSubscriber
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
            'summary'   => "created a delivery personnels profile for ".$event->model->fullname,
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
        
    }
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\CreateDeliveryPerson',
            'App\Listeners\DeliveryPersonEventSubscriber@onCreate'
        );

        $events->listen(
            'App\Events\DeleteDeliveryPerson',
            'App\Listeners\DeliveryPersonEventSubscriber@onDelete'
        );

        $events->listen(
            'App\Events\UpdateDeliveryPerson',
            'App\Listeners\DeliveryPersonEventSubscriber@onUpdate'
        );
    }
}
