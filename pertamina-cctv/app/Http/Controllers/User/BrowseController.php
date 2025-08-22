<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Room;

class BrowseController extends Controller
{
    public function rooms(Building $building)
    {
        $rooms = $building->rooms()->orderBy('name')->get();

        return view('User/Room/index', compact('building', 'rooms'));
    }

    public function cctvs(Building $building, Room $room)
    {
        $cctvs = $room->cctvs()->orderBy('name')->get();

        return view('User/Cctv/index', compact('building', 'room', 'cctvs'));
    }
}
