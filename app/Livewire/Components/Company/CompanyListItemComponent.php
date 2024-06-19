<?php

namespace App\Livewire\Components\Company;

use Livewire\Component;

class CompanyListItemComponent extends Component
{
    public $data;

    public function render()
    {
        return view('livewire.components.company.company-list-item-component');
    }
}
