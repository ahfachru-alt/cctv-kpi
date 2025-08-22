<?php

namespace App\Livewire\Admin\Contacts;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public string $q = '';

    protected $listeners = ['deleteContact' => 'delete'];

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        if ($id && ($c = Contact::find($id))) {
            $c->delete();
            $this->resetPage();
        }
    }

    public function render()
    {
        $contacts = Contact::query()
            ->when($this->q !== '', fn ($q) => $q->where('name', 'like', '%'.$this->q.'%')->orWhere('email', 'like', '%'.$this->q.'%'))
            ->orderByDesc('id')
            ->paginate(10);

        return view('livewire.admin.contacts.table', ['contacts' => $contacts]);
    }
}
