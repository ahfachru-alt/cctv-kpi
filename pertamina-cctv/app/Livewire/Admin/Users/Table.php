<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
	use WithPagination;

	public string $q = '';

	protected $updatesQueryString = ['q'];

	public function updatingQ() { $this->resetPage(); }

	public function render()
	{
		$users = User::query()
			->when($this->q !== '', fn($q) => $q->where(function($qq){
				$qq->where('name','like','%'.$this->q.'%')
					->orWhere('email','like','%'.$this->q.'%');
			}))
			->orderByDesc('id')
			->paginate(10);

		return view('livewire.admin.users.table', [ 'users' => $users ]);
	}
}
