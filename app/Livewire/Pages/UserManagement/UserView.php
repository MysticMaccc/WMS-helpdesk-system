<?php

namespace App\Livewire\Pages\UserManagement;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UserView extends Component
{
    public $title = "User Management";
    public $actionMessage = true;
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.user-management.user-view');
    }
}
