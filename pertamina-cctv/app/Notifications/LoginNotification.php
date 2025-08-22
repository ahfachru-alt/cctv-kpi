<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginNotification extends Notification
{
    use Queueable;

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Login Notification')
            ->line('Akun Anda baru saja login.')
            ->line('Jika ini bukan Anda, segera ubah password.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Anda berhasil login pada '.now()->toDateTimeString(),
        ];
    }
}
