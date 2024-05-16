<?php

namespace App\Livewire\Components\RequestTypeApprover;

use Livewire\Component;

class RequestTypeApproverListItemComponent extends Component
{
    public $data;
    
    public function render()
    {
        return view('livewire.components.request-type-approver.request-type-approver-list-item-component');
    }
}
