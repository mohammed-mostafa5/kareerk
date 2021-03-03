<?php

namespace App\Listeners;

use App\Events\SendNotification;

class NotificationCreated
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
     * @param  SendNotification  $event
     * @return void
     */
    public function handle(SendNotification $event)
    {
        $user = $event->notification->user;
        if ($user) $user->increment('notification_count', 1);
    }
}
