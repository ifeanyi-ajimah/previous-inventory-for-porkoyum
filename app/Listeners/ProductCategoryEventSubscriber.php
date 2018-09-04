<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCategoryEventSubscriber
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
            'summary'   => "created a new product category ".$event->model->category_name,
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
            'summary'   => "updated the product category ".$event->name,
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
            'summary'   => "deleted the category ".$event->name." along with all it's products and comms execs",
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
            'App\Events\CreateProductCategory',
            'App\Listeners\ProductCategoryEventSubscriber@onCreate'
        );

        $events->listen(
            'App\Events\DeleteProductCategory',
            'App\Listeners\ProductCategoryEventSubscriber@onDelete'
        );

        $events->listen(
            'App\Events\UpdateProductCategory',
            'App\Listeners\ProductCategoryEventSubscriber@onUpdate'
        );
    }
}
