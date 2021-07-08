<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserActivationEmail;
use App\Mail\Auth\ActivationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Support\Facades\Mail;
use Mail;


class SendActivationEmail
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
     * @param  UserActivationEmail  $event
     * @return void
     */
    public function handle(UserActivationEmail $event)
    {
        // dd($event);
        if($event->user->isVetified){
            return;
        }

        Mail::to($event->user->email)->send(new ActivationEmail($event->user));

    }
}
