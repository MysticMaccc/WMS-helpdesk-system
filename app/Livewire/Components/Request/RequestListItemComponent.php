<?php

namespace App\Livewire\Components\Request;

use Livewire\Component;

class RequestListItemComponent extends Component
{
    public $data;
    
    public function render()
    {
        return view('livewire.components.request.request-list-item-component');
    }

    public function show($hash)
    {
        return $this->redirectRoute('request.edit',['hash'=>$hash],navigate:true);
    }
}
