<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageReceivedNotification extends Notification
{
	use Queueable;

	public function __construct(public string $fromName, public string $preview)
	{
	}

	public function via(object $notifiable): array
	{
		return ['mail','database'];
	}

	public function toMail(object $notifiable): MailMessage
	{
		return (new MailMessage)
			->subject('Pesan Baru')
			->line('Anda menerima pesan baru dari '.$this->fromName)
			->line('"'.$this->preview.'"')
			->action('Buka Pesan', url('/chat'));
	}

	public function toArray(object $notifiable): array
	{
		return [
			'message' => 'Pesan baru dari '.$this->fromName.': '.$this->preview,
		];
	}
}