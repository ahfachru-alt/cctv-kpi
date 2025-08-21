<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\{Message, User};
use Illuminate\Support\Facades\Auth;

class Panel extends Component
{
    public string $message = '';
    public ?int $toUserId = null; // admin <-> user

    public function mount()
    {
        // If normal user, default to admin; if admin, allow picking user later
        if (! Auth::user()->hasRole('admin')) {
            $this->toUserId = User::role('admin')->value('id');
        }
    }

    public function send()
    {
        $this->validate(['message' => 'required|string|min:1']);
        if (! $this->toUserId) return;
        Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $this->toUserId,
            'body' => $this->message,
        ]);
        $this->message = '';
    }

    public function render()
    {
        $user = Auth::user();
        $query = Message::query()
            ->where(function($q) use ($user){
                $q->where('from_user_id',$user->id)->orWhere('to_user_id',$user->id);
            })
            ->when($this->toUserId, function($q){
                $q->where(function($qq){
                    $qq->where('from_user_id',$this->toUserId)->orWhere('to_user_id',$this->toUserId);
                });
            })
            ->latest('id')
            ->limit(50)
            ->get()
            ->reverse();

        return view('livewire.chat.panel', [
            'messages' => $query,
            'users' => User::select('id','name')->get(),
        ]);
    }
}
