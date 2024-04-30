<?php

namespace App\Livewire\Pages\RequestType;

use Livewire\Attributes\Layout;
use Livewire\Component;

class RequestTypeView extends Component
{
    public $title="Request Type Maintenance";

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.request-type.request-type-view');
    }
}
