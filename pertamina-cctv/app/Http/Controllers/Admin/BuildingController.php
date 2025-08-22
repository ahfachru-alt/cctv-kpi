<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        return view('Admin/Maps/index');
    }

    public function create()
    {
        return view('Admin/Maps/creat');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);
        $building = Building::create($validated);
        if ($request->expectsJson()) {
            return response()->json(['data' => $building], 201);
        }
        session()->flash('success', 'Building created successfully');

        return redirect()->route('admin.buildings.index');
    }

    public function show(Building $building)
    {
        return redirect()->route('admin.buildings.edit', $building);
    }

    public function edit(Building $building)
    {
        return view('Admin/Maps/edit', compact('building'));
    }

    public function update(Request $request, Building $building)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);
        $building->update($validated);
        if ($request->expectsJson()) {
            return response()->json(['data' => $building], 200);
        }
        session()->flash('success', 'Building updated successfully');

        return redirect()->route('admin.buildings.index');
    }

    public function destroy(Building $building)
    {
        $building->delete();
        if (request()->expectsJson()) {
            return response()->json([], 204);
        }
        session()->flash('success', 'Building deleted');

        return back();
    }
}
