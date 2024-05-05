<?php

namespace App\Livewire\Components\RequestTypeStatus;

use Livewire\Component;

class RequestTypeStatusListItemComponent extends Component
{
    public $data;
    
    public function render()
    {
        return view('livewire.components.request-type-status.request-type-status-list-item-component');
    }
}
