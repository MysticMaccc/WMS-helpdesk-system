<?php

namespace App\Livewire\Components\DepartmentMaintenance;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentListComponent extends Component
{
    use WithPagination;
    public $listTitle = "Department list";
    public $search;

    public function render()
    {
        $departmentData = Department::where('is_active', 1)->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
        })
            ->orderBy('name', 'asc')->paginate(10);
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
