<?php

namespace App\Livewire\Pages\Department;

use Livewire\Attributes\Layout;
use Livewire\Component;

class DepartmentView extends Component
{
    public $title = "Department Maintenance";
    public $actionMessage = true;
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.department.department-view');
    }

    public function destroyRequestMessage()
    {
        $this->actionMessage = false;
    }
}
