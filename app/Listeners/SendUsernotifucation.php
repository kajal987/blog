<?php

namespace App\Listeners;

use App\Events\usercreated as UserCreated;

class SendUsernotifucation
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
     * @param  usercreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
      app('log')->info("new user created");

    }
}
