<?php

namespace App\Livewire\Admin\Rooms;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
	use WithPagination;

	public string $q = '';

	public function updatingQ(){ $this->resetPage(); }

	public function render()
	{
		$rooms = Room::with('building')
			->when($this->q !== '', function($q){
				$q->where('name','like','%'.$this->q.'%');
			})
			->orderBy('name')
			->paginate(10);

		return view('livewire.admin.rooms.table', [ 'rooms' => $rooms ]);
	}
}
