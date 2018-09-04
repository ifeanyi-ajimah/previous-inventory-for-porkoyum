<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderEventSubscriber
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
            'summary'   => "created a new order for ".$event->model->product->product_name." by ".$event->model->customer->name." with phone number: ".$event->model->customer->phone_no,
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
            'summary'   => "updated an order for ".$event->product." made by ".$event->customer,
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
            'summary'   => "deleted an order for ".$event->product." made by ".$event->customer,
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
            'App\Events\CreateOrder',
            'App\Listeners\OrderEventSubscriber@onCreate'
        );

        $events->listen(
            'App\Events\DeleteOrder',
            'App\Listeners\OrderEventSubscriber@onDelete'
        );

        $events->listen(
            'App\Events\UpdateOrder',
            'App\Listeners\OrderEventSubscriber@onUpdate'
        );
    }
}
