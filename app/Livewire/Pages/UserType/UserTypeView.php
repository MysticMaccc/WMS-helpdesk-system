<?php

namespace App\Livewire\Pages\UserType;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UserTypeView extends Component
{
    #[Layout('layouts.app')]
    public $title = "User Type Maintenance";
    public $actionMessage = true;
    
    public function render()
    {
        return view('livewire.pages.user-type.user-type-view');
    }

    public function destroyRequestMessage()
    {
        $this->actionMessage = false;
    }
}
