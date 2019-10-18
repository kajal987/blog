<?php

namespace App\Listeners;


use App\Events\usercreated as UserCreated;
use Illuminate\Support\Facades\Log;

class SendSlackNotificationOnRegisterSuccess
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
     * @param  UserCreated $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
//        Log::info(
//            sprintf('%s slack notification sent successfully.', $event->user->name)
//        );
            app('log')->info('New User created');
    }
}
