<?php

namespace App\Livewire\Pages\Department;

use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use App\ResourcesTrait;
use Illuminate\Support\Facades\Auth;
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
        'user_id' => 'required',
        'department' => 'required|min:2',
        'company' => 'required',
    ])]
    public $department;
    public $user_id;
    public $company;

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $departmentData = Department::where('hash', $hash)->first();
            if (!$departmentData) {
                abort(404);
            }
            $this->department = $departmentData->name;
            $this->user_id = $departmentData->user_id;
        }
    }
    public function store()
    {
        if (Auth::user()->user_type_id != 1) {
            $this->validate([
                'user_id' => 'required',
                'department' => 'required|min:2',
            ]);
        } else {
            $this->validate();
        }

        $this->storeResource(Department::class, [
            'user_id' => $this->user_id,
            'name' => $this->department,
            'company_id' => Auth::user()->user_type_id == 1 ?  $this->company : Auth::user()->company_id,
        ]);
        return $this->redirectRoute('department.index', navigate: true);
    }

    public function update()
    {
        if (Auth::user()->user_type_id != 1) {
            $this->validate([
                'user_id' => 'required',
                'department' => 'required|min:2',
            ]);
        } else {
            $this->validate();
        }

        $this->updateResource(Department::class, [
            'user_id' => $this->user_id,
            'name' => $this->department,
            'company_id' => Auth::user()->user_type_id == 1 ?  $this->company : Auth::user()->company_id,
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
        $companyData = Company::getAllCompany();
        $usersData = User::getUserForDropdown();

        return view('livewire.pages.department.create-department-view', compact('companyData', 'usersData'));
    }
}
