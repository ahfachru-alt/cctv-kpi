<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    public ?User $user = null;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|email|max:255')]
    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function mount(?User $user = null)
    {
        $this->user = $user;
        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
        }
    }

    public function save()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email'.($this->user ? ','.$this->user->id : ''),
        ];
        if (! $this->user) {
            $rules['password'] = 'required|confirmed|min:8';
        }
        $this->validate($rules);

        if ($this->user) {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            session()->flash('success', 'User updated successfully');
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            session()->flash('success', 'User created successfully');
        }

        return redirect()->route('admin.users.index');
    }

    public function render()
    {
        return view('livewire.admin.users.form');
    }
}
