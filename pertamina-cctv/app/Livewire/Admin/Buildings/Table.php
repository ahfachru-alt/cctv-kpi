<?php

namespace App\Livewire\Admin\Buildings;

use App\Models\Building;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
	use WithPagination;

	public string $q = '';

	public function updatingQ(){ $this->resetPage(); }

	public function render()
	{
		$buildings = Building::query()
			->when($this->q !== '', fn($q) => $q->where('name','like','%'.$this->q.'%'))
			->orderBy('name')
			->paginate(10);

		return view('livewire.admin.buildings.table', [ 'buildings' => $buildings ]);
	}
}
