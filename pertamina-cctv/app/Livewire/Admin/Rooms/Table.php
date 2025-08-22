<?php

namespace App\Livewire\Admin\Rooms;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public string $q = '';

    protected $listeners = ['deleteRoom' => 'delete'];

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        if ($id && ($room = Room::find($id))) {
            $room->delete();
            $this->resetPage();
        }
    }

    public function render()
    {
        $rooms = Room::with('building')
            ->when($this->q !== '', function ($q) {
                $q->where('name', 'like', '%'.$this->q.'%');
            })
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.admin.rooms.table', ['rooms' => $rooms]);
    }
}
