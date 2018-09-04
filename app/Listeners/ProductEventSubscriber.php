<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductEventSubscriber
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
            'summary'   => "created a new product ".$event->model->product_name,
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
            'summary'   => "updated the product ".$event->name,
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
            'summary'   => "deleted the product ".$event->name,
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
            'App\Events\CreateProduct',
            'App\Listeners\ProductEventSubscriber@onCreate'
        );

        $events->listen(
            'App\Events\DeleteProduct',
            'App\Listeners\ProductEventSubscriber@onDelete'
        );

        $events->listen(
            'App\Events\UpdateProduct',
            'App\Listeners\ProductEventSubscriber@onUpdate'
        );
    }
}
