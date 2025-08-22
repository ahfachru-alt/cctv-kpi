<?php

namespace App\Livewire\Admin\Rooms;

use App\Models\{Room, Building};
use Livewire\Component;

class Form extends Component
{
	public ?Room $room = null;
	public ?int $building_id = null;
	public string $name = '';
	public int $floor = 1;

	public function mount(?Room $room = null)
	{
		$this->room = $room;
		if ($room) {
			$this->building_id = $room->building_id;
			$this->name = $room->name;
			$this->floor = (int)$room->floor;
		}
	}

	public function save()
	{
		$data = $this->validate([
			'building_id' => 'required|exists:buildings,id',
			'name' => 'required|string|max:255',
			'floor' => 'required|integer|min:1',
		]);
		if ($this->room) {
			$this->room->update($data);
		} else {
			Room::create($data);
		}
		return redirect()->route('admin.rooms.index');
	}

	public function render()
	{
		return view('livewire.admin.rooms.form', [
			'buildings' => Building::orderBy('name')->get(['id','name'])
		]);
	}
}
