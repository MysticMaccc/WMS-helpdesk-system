<?php

namespace App\Livewire\Components\DepartmentMaintenance;

use Livewire\Component;

class DepartmentListItemComponent extends Component
{
    public $data;

    public function render()
    {
        return view('livewire.components.department-maintenance.department-list-item-component');
    }
}
