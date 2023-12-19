<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Mail;

class SendMailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMail $event): void
    {
        $user = User::find($event->userId)->toArray();
        Mail::send('index', $user, function($message) use($user){
            // dd($message);
            $message->subject('You are Registered');
            $message->to($user['email']);
            echo "sending mail";
        }); 
    }
}
