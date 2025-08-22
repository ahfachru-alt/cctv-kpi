<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordOtpNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $code) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Kode OTP Reset Password')
            ->line('Gunakan kode OTP berikut untuk reset password:')
            ->line('')
            ->line('KODE: '.$this->code)
            ->line('')
            ->line('Kode berlaku selama 10 menit.')
            ->line('Jika Anda tidak meminta reset, abaikan email ini.');
    }
}
