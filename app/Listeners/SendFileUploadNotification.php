<?php

namespace App\Listeners;

use App\Events\UserFileUploadProcessed;
use App\Models\User;
use App\Notifications\AdminFileUploadNotification;
use App\Notifications\UserFileUploadNotification;
use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;

class SendFileUploadNotification  
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
     * @param  \App\Events\UserFileUploadProcessed  $event
     * @return void
     */
    public function handle(UserFileUploadProcessed $event)
    {
        $user = User::where('id', Auth::id())->first();
        $admins = User::where('user_type','admin')->get();

        Notification::send($user, new UserFileUploadNotification($event->data['subject']));

        foreach($admins as $admin){
            Notification::send($admin, new AdminFileUploadNotification($user,$event->data, $admin));
        }

        
    }
}
