<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use Auth;
use Log;

class SendMailFired
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
     * @param  \App\Events\SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        //
        

        $data['email'] =$event->user['email'];
        $data['name'] =$event->user['name'];
        Log::info($data);

        Mail::send('jobcompleted',$data, function ($message) use($data){
            $message->to($data['email']);
            $message->subject('Job completed successfully');
        });
    }
}
