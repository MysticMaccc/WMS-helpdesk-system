<?php

namespace App\Livewire\Components\UserManagement;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserListComponent extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $userData = User::getAllUser($this->search);

        return view(
            'livewire.components.user-management.user-list-component',
            [
                'userData' => $userData
            ]
        );
    }
}
