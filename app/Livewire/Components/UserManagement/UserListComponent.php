<?php

namespace App\Livewire\Components\UserManagement;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserListComponent extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $userData = User::whereAny([
            'firstname',
            'email',
            'lastname',
        ], 'LIKE', '%' . $this->search . '%')->orderBy('firstname', 'asc')
            ->paginate(16);

        return view(
            'livewire.components.user-management.user-list-component',
            [
                'userData' => $userData
            ]
        );
    }
}
