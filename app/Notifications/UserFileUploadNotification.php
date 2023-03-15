<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Auth;
use Carbon\Carbon;

class UserFileUploadNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $subject;
    public $name;
    public $email;
    public function __construct($subject)
    {
        $this->subject = $subject;
        $this->name = Auth::user()->name;
        $this->email = Setting::first()->email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->from($this->email)
        ->subject('File Upload Confirmation '.$this->subject)
        ->greeting("Dear " .$this->name)
        ->line('    
            This is to confirm that the file you uploaded or your application has been successfully submitted. 
            You will be notified whether it has been selected or rejected. If you have any questions 
             or concerns regarding this, please do not hesitate to contact us.
         ');    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
