<?php

namespace App\Containers\User\Events\Handlers;

use App\Containers\User\Events\Events\UserCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class UserCreatedEventHandler
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class UserCreatedEventHandler implements ShouldQueue
{

    public function __construct()
    {

    }

    /**
     * @param \App\Containers\User\Events\Events\UserCreatedEvent $event
     */
    public function handle(UserCreatedEvent $event)
    {
//        $this->welcomeEmail->to($event->user->email, $event->user->name)->send([
//            'name'    => $event->user->name,
//            'appName' => 'apiato'
//        ]);
    }
}
