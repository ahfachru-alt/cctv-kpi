<?php

namespace App\Livewire\Admin\Locations;

use App\Models\{Building, Room, Cctv};
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Table extends Component
{
	use WithPagination;
	public string $q = '';
	public function updatingQ(){ $this->resetPage(); }

	public function render()
	{
		$buildings = Building::withCount(['rooms','cctvs'])
			->when($this->q !== '', fn($q) => $q->where('name','like','%'.$this->q.'%'))
			->orderBy('name')
			->paginate(10);
		return view('livewire.admin.locations.table', [ 'buildings' => $buildings ]);
	}
}
