<?php

namespace App\Livewire\Pages\Company;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CompanyView extends Component
{
    public $title = "Company View";
    public $actionMessage = true;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.company.company-view');
    }

    public function destroyRequestMessage()
    {
        $this->actionMessage = false;
    }
}
