<?php

namespace App\Livewire\Pages\RequestTypeStatus;

use Livewire\Attributes\Layout;
use Livewire\Component;

class RequestTypeStatusView extends Component
{
    public $title = "Request Type Status Maintenance";
    public $actionMessage = true;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.request-type-status.request-type-status-view');
    }

    public function destroyRequestMessage()
    {
        $this->actionMessage = false;
    }
}
