<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

class TableController extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request)
	{
		$thresholdMinutes = 30;
		$users = User::select('id','name','email','last_login_at')->orderBy('name')->get()->map(function($u) use ($thresholdMinutes){
			$status = 'offline';
			if ($u->last_login_at && $u->last_login_at->gt(now()->subMinutes($thresholdMinutes))) {
				$status = 'online';
			}
			$u->computed_status = $status;
			return $u;
		});
		return view('Admin/Table/index', compact('users'));
	}
}
