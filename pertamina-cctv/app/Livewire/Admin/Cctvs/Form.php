<?php

namespace App\Livewire\Admin\Cctvs;

use App\Models\Building;
use App\Models\Cctv;
use App\Models\Room;
use Livewire\Component;

class Form extends Component
{
    public ?Cctv $cctv = null;

    public ?int $building_id = null;

    public ?int $room_id = null;

    public string $name = '';

    public string $status = 'offline';

    public string $rtsp_url = '';

    public string $ip_address = '';

    public function mount(?Cctv $cctv = null)
    {
        $this->cctv = $cctv;
        if ($cctv) {
            $this->building_id = $cctv->building_id;
            $this->room_id = $cctv->room_id;
            $this->name = $cctv->name;
            $this->status = $cctv->status;
            $this->rtsp_url = $cctv->rtsp_url;
            $this->ip_address = $cctv->ip_address ?? '';
        }
    }

    public function save()
    {
        $data = $this->validate([
            'building_id' => 'required|exists:buildings,id',
            'room_id' => 'nullable|exists:rooms,id',
            'name' => 'required|string|max:255',
            'status' => 'required|in:online,offline,maintenance',
            'rtsp_url' => 'required|string',
            'ip_address' => 'nullable|ip',
        ]);
        if ($this->cctv) {
            $this->cctv->update($data);
            session()->flash('success', 'CCTV updated successfully');
        } else {
            Cctv::create($data);
            session()->flash('success', 'CCTV created successfully');
        }

        return redirect()->route('admin.cctvs.index');
    }

    public function render()
    {
        $rooms = [];
        if ($this->building_id) {
            $rooms = Room::where('building_id', $this->building_id)->orderBy('name')->get(['id', 'name']);
        }

        return view('livewire.admin.cctvs.form', [
            'buildings' => Building::orderBy('name')->get(['id', 'name']),
            'roomsOptions' => $rooms,
        ]);
    }
}
