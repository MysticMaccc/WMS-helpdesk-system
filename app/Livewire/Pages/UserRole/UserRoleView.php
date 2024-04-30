<?php

namespace App\Livewire\Pages\UserRole;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UserRoleView extends Component
{
    public $title = "User Roles View";

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.user-role.user-role-view');
    }
}
