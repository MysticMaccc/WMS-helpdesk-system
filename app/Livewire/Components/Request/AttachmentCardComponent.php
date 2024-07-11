<?php

namespace App\Livewire\Components\Request;

use Livewire\Component;

class AttachmentCardComponent extends Component
{
    public $data = null;

    public function render()
    {
        return view('livewire.components.request.attachment-card-component');
    }
}
