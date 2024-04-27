<?php

namespace App\Livewire\Pages\Request;

use Livewire\Attributes\Layout;
use Livewire\Component;

class RequestView extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.request.request-view');
    }
}
