<?php

namespace App\Livewire\Pages\Request;

use Livewire\Attributes\Layout;
use Livewire\Component;

class RequestView extends Component
{
    public $title = "Request View";
    public $actionMessage = true;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.request.request-view');
    }

    public function destroyRequestMessage()
    {
        $this->actionMessage = false;
    }
}
