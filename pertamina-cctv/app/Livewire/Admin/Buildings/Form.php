<?php

namespace App\Livewire\Admin\Buildings;

use App\Models\Building;
use Livewire\Component;

class Form extends Component
{
	public ?Building $building = null;
	public string $name = '';
	public ?float $latitude = null;
	public ?float $longitude = null;
	public string $address = '';

	public function mount(?Building $building = null)
	{
		$this->building = $building;
		if ($building) {
			$this->name = $building->name;
			$this->latitude = (float)$building->latitude;
			$this->longitude = (float)$building->longitude;
			$this->address = (string)$building->address;
		}
	}

	public function save()
	{
		$data = $this->validate([
			'name' => 'required|string|max:255',
			'latitude' => 'nullable|numeric',
			'longitude' => 'nullable|numeric',
			'address' => 'nullable|string|max:255',
		]);
		if ($this->building) {
			$this->building->update($data);
		} else {
			Building::create($data);
		}
		return redirect()->route('admin.buildings.index');
	}

	public function render()
	{
		return view('livewire.admin.buildings.form');
	}
}
