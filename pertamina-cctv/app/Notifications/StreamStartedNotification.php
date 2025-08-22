<?php

namespace App\Notifications;

use App\Models\Cctv;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StreamStartedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Cctv $cctv) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Stream CCTV Dimulai')
            ->line('Streaming telah dimulai untuk CCTV: '.$this->cctv->name)
            ->action('Buka Stream', url('/stream/'.$this->cctv->id));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Streaming dimulai untuk '.$this->cctv->name,
        ];
    }
}
