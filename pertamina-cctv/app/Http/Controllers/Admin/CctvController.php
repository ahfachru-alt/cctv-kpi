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
		return back();
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
		return back();
	}

	public function destroy(Cctv $cctv)
	{
		$cctv->delete();
		return back();
	}
}
