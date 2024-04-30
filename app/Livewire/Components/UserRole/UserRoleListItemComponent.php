<?php

namespace App\Livewire\Components\UserRole;

use Livewire\Component;

class UserRoleListItemComponent extends Component
{
    public $data; 

    public function render()
    {
        return view('livewire.components.user-role.user-role-list-item-component');
    }
}
