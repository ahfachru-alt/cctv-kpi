<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
	public function index()
	{
		return view('Admin/Location/index');
	}

	public function create()
	{
		return view('Admin/Location/creat');
	}

	public function store(Request $request)
	{
		return back();
	}

	public function show(Room $room)
	{
		return redirect()->route('admin.rooms.edit', $room);
	}

	public function edit(Room $room)
	{
		return view('Admin/Location/edit', compact('room'));
	}

	public function update(Request $request, Room $room)
	{
		return back();
	}

	public function destroy(Room $room)
	{
		$room->delete();
		return back();
	}
}
