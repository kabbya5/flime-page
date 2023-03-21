<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class userFileStatusChangeNotification extends Notification 
{
    use Queueable;

    public $status;
    public $file;
    public $user;
    public $email;
                   
    public function __construct($status,$file,$user)
    {
        $this->status = $status;
        $this->file = $file;
        $this->user = $user;
        $this->email = Setting::first()->email;
    }

    
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->from($this->email)
        ->subject('Your file has been' .' ' .$this->status)
        ->greeting("Dear " .$this->user->name)
        ->line('    
            The file you have uploaded has been
            ' .$this->status. '. If you have any questions 
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
            
            'section' => $this->file->section,
            'status' => $this->status,
            'subject'  => $this->file->subject,
            'date' => Carbon::now()->format('Y-m-d'),

        ];
    }
}
