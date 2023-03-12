<?php

namespace App\Listeners;

use App\Events\FormSubmitedProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Notification;
use App\Notifications\UserFileUploadNotification;
use App\Notifications\AdminFileUploadNotification;

class FormSubmiteNotification 
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
     * @param  \App\Events\FormSubmitedProcessed  $event
     * @return void
     */
    public function handle(FormSubmitedProcessed $event)
    {
        $user = User::where('id', $event->user_id)->first();
        $admins = User::where('user_type','admin')->get();

        Notification::send($user, new UserFileUploadNotification('form submited'));

        foreach($admins as $admin){
            Notification::send($admin, new AdminFileUploadNotification($user,$event->input_type, $admin));
        }
    }
}
