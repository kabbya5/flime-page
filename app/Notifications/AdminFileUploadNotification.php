<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminFileUploadNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $data;
    public $admin;
    public function __construct($user, $data,$admin)
    {
        $this->user = $user;
        $this->data = $data;
        $this->admin = $admin;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {   
        $url = url('/admin/dasboard/'. $this->admin->slug);
        return (new MailMessage)
            ->from($this->user->email)
            ->subject('New file uploaded '.$this->data['subject'])
            ->greeting("Dear " .$this->admin->name)
            ->line('This is to notify you that a new file has been uploaded to Your Website.')
            ->line('You can access the file by logging into your account and navigating to the appropriate section of the website.')
            ->action('View File', url($url));
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
            'image' => $this->user->profile_img,
            'user_name' => $this->user->name,
            'subject'  => $this->data['subject'],
            'subsection_name' =>$this->data['subsection_name'],
            'date' => Carbon::now()->format('Y-m-d'),
        ];
    }
}
