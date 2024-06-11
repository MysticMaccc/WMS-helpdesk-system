<?php

namespace App\Livewire\Components\Request;

use Livewire\Component;

class HistoryCardComponent extends Component
{
    public $data;
    public $hash;
    
    public function render()
    {
        return view('livewire.components.request.history-card-component');
    }
}
