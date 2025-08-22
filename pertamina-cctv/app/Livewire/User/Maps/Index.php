<?php

namespace App\Livewire\User\Maps;

use App\Models\Building;
use Livewire\Component;

class Index extends Component
{
    public string $statusFilter = 'all';

    public string $search = '';

    public function render()
    {
        $buildings = Building::with(['cctvs' => function ($q) {
            if ($this->statusFilter !== 'all') {
                $q->where('status', $this->statusFilter);
            }
        }])->when($this->search !== '', function ($q) {
            $q->where('name', 'like', '%'.$this->search.'%');
        })->get();

        return view('livewire.user.maps.index', [
            'buildings' => $buildings,
        ]);
    }
}
