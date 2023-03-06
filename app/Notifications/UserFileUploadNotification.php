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

    public $data;
    public $name;
    public $email;
    public function __construct($data)
    {
        $this->data = $data;
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
        ->subject('File Upload Confirmation '.$this->data['subject'])
        ->greeting("Dear " .$this->name)
        ->line('This email is to confirm that the file you uploaded on ' . Carbon::now()->format('Y-m-d g:i A') .' has been successfully received and saved in our system.')
        ->line('If you have any questions or concerns regarding this file upload, please do not hesitate to contact us.
            Thank you for using our services.
        .');
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
