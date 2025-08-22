<?php

namespace App\Livewire\Admin\Cctvs;

use App\Models\Cctv;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public string $q = '';

    public string $status = 'all';

    protected $listeners = ['deleteCctv' => 'delete'];

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        if ($id && ($c = Cctv::find($id))) {
            $c->delete();
            $this->resetPage();
        }
    }

    public function render()
    {
        $cctvs = Cctv::with(['building', 'room'])
            ->when($this->q !== '', function ($q) {
                $q->where('name', 'like', '%'.$this->q.'%')
                    ->orWhere('ip_address', 'like', '%'.$this->q.'%');
            })
            ->when($this->status !== 'all', fn ($q) => $q->where('status', $this->status))
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin.cctvs.table', ['cctvs' => $cctvs]);
    }
}
