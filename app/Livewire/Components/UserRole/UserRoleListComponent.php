<?php

namespace App\Livewire\Components\UserRole;

use App\Models\UserRole;
use Livewire\Component;
use Livewire\WithPagination;

class UserRoleListComponent extends Component
{
    use WithPagination;
    public $listTitle = "User Role List";

    public function render()
    {
        $userRoleData = UserRole::paginate(7);

        return view('livewire.components.user-role.user-role-list-component' , compact('userRoleData'));
    }

    public function dump()
    {
        dd('test');
    }
}
