<?php

namespace App\Livewire\Components\RequestType;

use Livewire\Component;

class RequestTypeListItemComponent extends Component
{
    public $data;
    
    public function render()
    {
        return view('livewire.components.request-type.request-type-list-item-component');
    }
    
}
