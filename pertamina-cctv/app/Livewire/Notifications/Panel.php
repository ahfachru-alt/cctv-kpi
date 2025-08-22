<?php

namespace App\Livewire\Notifications;

use Livewire\Component;
use Livewire\WithPagination;

class Panel extends Component
{
    use WithPagination;

    public function markAllRead(): void
    {
        $user = auth()->user();
        if ($user) {
            $user->unreadNotifications->markAsRead();
        }
    }

    public function markRead(string $id): void
    {
        $user = auth()->user();
        if ($user) {
            $notification = $user->notifications()->where('id', $id)->first();
            if ($notification && is_null($notification->read_at)) {
                $notification->markAsRead();
            }
        }
    }

    public function render()
    {
        $user = auth()->user();
        $notifications = $user ? $user->notifications()->orderByDesc('created_at')->paginate(15) : collect();

        return view('livewire.notifications.panel', ['notifications' => $notifications]);
    }
}
