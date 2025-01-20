<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Uses list')]
#[Layout('components.layouts.app')]
class Users extends Component
{
    use WithPagination;

    public $perPage = 5;

    #[Url()]
    public $search = '';

    #[Url()]
    public $role = '';

    #[Url()]
    public $sortField = 'created_at';

    #[Url()]
    public $sortDirection = 'asc';

    public function updatedSearch(){
        $this->resetPage();
    }

    public function setSortField($sortField)
    {
        ($this->sortField == $sortField) ?
            $this->sortDirection = ($this->sortDirection == 'asc') ? 'desc' : 'asc' :
            $this->sortDirection = 'asc';

        $this->sortField = $sortField;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => User::search($this->search)
                ->when(
                    $this->role !== '',
                    fn($query) =>
                    $query->where('role', $this->role)
                )
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
