<?php

namespace App\Livewire\Components\UserManagement;

use Livewire\Component;

class UserListItemComponent extends Component
{
    public $data;

    public function render()
    {
        return view('livewire.components.user-management.user-list-item-component');
    }
}
