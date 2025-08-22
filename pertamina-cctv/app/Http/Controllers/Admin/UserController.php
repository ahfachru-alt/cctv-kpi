<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('Admin/User/index');
    }

    public function create()
    {
        return view('Admin/User/creat');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        if ($request->expectsJson()) {
            return response()->json(['data' => $user], 201);
        }
        session()->flash('success', 'User created successfully');

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        return redirect()->route('admin.users.edit', $user);
    }

    public function edit(User $user)
    {
        return view('Admin/User/edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);
        $payload = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];
        if (! empty($validated['password'])) {
            $payload['password'] = Hash::make($validated['password']);
        }
        $user->update($payload);
        if ($request->expectsJson()) {
            return response()->json(['data' => $user], 200);
        }
        session()->flash('success', 'User updated successfully');

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        if (request()->expectsJson()) {
            return response()->json([], 204);
        }
        session()->flash('success', 'User deleted');

        return back();
    }
}
