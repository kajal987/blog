<?php

namespace App\Events;

use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class usercreated //implements ShouldQueue
{
    use Dispatchable, SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     * @param User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
