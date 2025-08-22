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
		return back();
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
		return back();
	}

	public function destroy(Building $building)
	{
		$building->delete();
		return back();
	}
}
