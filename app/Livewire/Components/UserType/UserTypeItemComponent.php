<?php

namespace App\Livewire\Components\UserType;

use Livewire\Component;

class UserTypeItemComponent extends Component
{
    public $data;
    public function render()
    {
        return view('livewire.components.user-type.user-type-item-component');
    }
}
