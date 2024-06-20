<?php

namespace App\Livewire\Components\DepartmentMaintenance;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentListComponent extends Component
{
    use WithPagination;
    public $listTitle = "Department list";
    public $search;

    public function render()
    {
        $departmentData = Department::getAllDepartment($this->search);

        return view(
            'livewire.components.department-maintenance.department-list-component',
            [
                'departmentData' => $departmentData
            ]
        );
    }

    public function create()
    {
        return $this->redirectRoute('department.create', navigate: true);
    }
}
