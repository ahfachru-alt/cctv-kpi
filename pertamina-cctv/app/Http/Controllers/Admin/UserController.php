<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
		return back();
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
		return back();
	}

	public function destroy(User $user)
	{
		$user->delete();
		return back();
	}
}
