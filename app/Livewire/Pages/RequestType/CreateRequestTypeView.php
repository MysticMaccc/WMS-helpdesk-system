<?php

namespace App\Livewire\Pages\RequestType;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateRequestTypeView extends Component
{
    public $title="Create Request Type";
    
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.request-type.create-request-type-view');
    }
}
