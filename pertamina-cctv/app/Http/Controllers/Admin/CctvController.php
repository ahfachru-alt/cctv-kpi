<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cctv;
use Illuminate\Http\Request;

class CctvController extends Controller
{
    public function index()
    {
        return view('Admin/Cctv/index');
    }

    public function create()
    {
        return view('Admin/Cctv/creat');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'building_id' => ['required', 'exists:buildings,id'],
            'room_id' => ['nullable', 'exists:rooms,id'],
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:online,offline,maintenance'],
            'rtsp_url' => ['required', 'string'],
            'ip_address' => ['nullable', 'ip'],
        ]);
        $cctv = Cctv::create($validated);
        if ($request->expectsJson()) {
            return response()->json(['data' => $cctv], 201);
        }
        session()->flash('success', 'CCTV created successfully');

        return redirect()->route('admin.cctvs.index');
    }

    public function show(Cctv $cctv)
    {
        return redirect()->route('admin.cctvs.edit', $cctv);
    }

    public function edit(Cctv $cctv)
    {
        return view('Admin/Cctv/edit', compact('cctv'));
    }

    public function update(Request $request, Cctv $cctv)
    {
        $validated = $request->validate([
            'building_id' => ['required', 'exists:buildings,id'],
            'room_id' => ['nullable', 'exists:rooms,id'],
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:online,offline,maintenance'],
            'rtsp_url' => ['required', 'string'],
            'ip_address' => ['nullable', 'ip'],
        ]);
        $cctv->update($validated);
        if ($request->expectsJson()) {
            return response()->json(['data' => $cctv], 200);
        }
        session()->flash('success', 'CCTV updated successfully');

        return redirect()->route('admin.cctvs.index');
    }

    public function destroy(Cctv $cctv)
    {
        $cctv->delete();
        if (request()->expectsJson()) {
            return response()->json([], 204);
        }
        session()->flash('success', 'CCTV deleted');

        return back();
    }
}
