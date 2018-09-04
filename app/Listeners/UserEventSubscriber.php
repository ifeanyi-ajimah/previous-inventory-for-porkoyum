<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event) 
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
            'summary'   => "just logged in",
            'action'    => 'login'
        ]);
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event) 
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
            'summary'   => "just logged out",
            'action'    => 'logout'
        ]);
    }

    /**
     * Hanlde user profile creation events.
     */
    public function onCreate($event)
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
                'summary'   => "created a new user account ".$event->user->name,
                'action'    => 'create'
        ]);
    }

    /**
     * Hanlde user profile update events.
     */
    public function onUpdate($event)
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
                'summary'   => "created a new user account ".$event->user->name,
                'action'    => 'create'
        ]);
    }

    /**
     * Hanlde user profile deletion events.
     */
    public function onDelete($event)
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
                'summary'   => "created a new user account ".$event->user->name,
                'action'    => 'create'
        ]);
    }

    /**
     * Hanlde attaching role to user events.
     */
    public function onAttachRole($event)
    {
        \App\ActivityLog::create([
            'user_id'   => \Auth::id(),
                'summary'   => "added a ".$event->role->name." role to ".$event->user->name,
                'action'    => 'add'
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
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );

        $events->listen(
            'App\Events\CreateUserProfile',
            'App\Listeners\UserEventSubscriber@onCreate'
        );

        $events->listen(
            'App\Events\DeleteUserProfile',
            'App\Listeners\UserEventSubscriber@onDelete'
        );

        $events->listen(
            'App\Events\UpdateUserProfile',
            'App\Listeners\UserEventSubscriber@onUpdate'
        );

        $events->listen(
            'App\Events\AttachRoleToUser',
            'App\Listeners\UserEventSubscriber@onAttachRole'
        );
    }
}
