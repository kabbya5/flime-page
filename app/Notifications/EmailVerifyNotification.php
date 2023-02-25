<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Auth;
use Session;
class EmailVerifyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $code;
    
    public function __construct()
    {
        $user_id = Auth::id();
        $this->code = mt_rand(1000,9999);

        Session::put('email_code',$this->code);
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
        ->subject('Please Verify Your Email Address')
        ->line('Thank you for registering for our service! To complete your account setup and start using our platform, we need to verify your email address.')
        ->line('Please use the following activation code to complete the verification process: ')
        ->action($this->code,$this->code)
        ->line('If you did not register on our website, please ignore this message. However, if you believe someone else may have used your email address to create an account, please contact our customer support team immediately.');
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
