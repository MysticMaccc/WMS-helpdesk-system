<?php

namespace App\Livewire\Pages\Department;

use App\Models\Department;
use App\Models\User;
use App\ResourcesTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateDepartmentView extends Component
{
    use ResourcesTrait;
    public $title = "Create Department";
    public $hash;
    public $users;
    #[Validate([
        'department' => 'required|min:2',
    ])]
    public $department;

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $departmentData = Department::where('hash', $hash)->first();
            if (!$departmentData) {
                abort(404);
            }
            $this->department = $departmentData->name;
        }

        $this->users = User::where('is_active', 1)->get();
    }
    public function store()
    {
        $this->validate();
        $this->storeResource(Department::class, [
            'name' => $this->department,
        ]);
        return $this->redirectRoute('department.index', navigate: true);
    }

    public function update()
    {
        $this->validate();
        $this->updateResource(Department::class, [
            'name' => $this->department,
        ]);
        return $this->redirectRoute('department.index', navigate: true);
    }

    public function destroy($hash)
    {
        $this->destroyResource(Department::class, $hash);
        return $this->redirectRoute('department.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.department.create-department-view');
    }
}
