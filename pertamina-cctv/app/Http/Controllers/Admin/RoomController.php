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
        $validated = $request->validate([
            'building_id' => ['required', 'exists:buildings,id'],
            'name' => ['required', 'string', 'max:255'],
            'floor' => ['required', 'integer', 'min:1'],
        ]);
        $room = Room::create($validated);
        if ($request->expectsJson()) {
            return response()->json(['data' => $room], 201);
        }
        session()->flash('success', 'Room created successfully');

        return redirect()->route('admin.rooms.index');
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
        $validated = $request->validate([
            'building_id' => ['required', 'exists:buildings,id'],
            'name' => ['required', 'string', 'max:255'],
            'floor' => ['required', 'integer', 'min:1'],
        ]);
        $room->update($validated);
        if ($request->expectsJson()) {
            return response()->json(['data' => $room], 200);
        }
        session()->flash('success', 'Room updated successfully');

        return redirect()->route('admin.rooms.index');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        if (request()->expectsJson()) {
            return response()->json([], 204);
        }
        session()->flash('success', 'Room deleted');

        return back();
    }
}
