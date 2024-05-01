<?php

namespace App\Livewire\Pages\RequestType;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateRequestTypeView extends Component
{
    public $title="Create Request Type";

    #[Validate([
        'department' => 'required',
        'category' => 'required',
        'name' => 'required|min:2|max:20'
    ])]
    public $department;
    public $category;
    public $name;
    
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.request-type.create-request-type-view');
    }

    public function store()
    {
        $this->validate();
    }
}
