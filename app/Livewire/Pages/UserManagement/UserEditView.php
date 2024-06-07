<?php

namespace App\Livewire\Pages\UserManagement;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserEditView extends Component
{
    public $hash, $user, $showModal;
    public $firstname, $middlename, $lastname, $suffix, $email, $department, $position;
    public $departmentData, $positionData;
    public $sideModal = false, $sideDepartmentModal = false;

    #[Layout('layouts.app')]

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $this->user = User::where('hash', $hash)->first();
            $this->departmentData = Department::where('is_active', 1)->orderBy('name', 'asc')->get();
            $this->positionData = Position::where('is_active', 1)->orderBy('name', 'asc')->get();
            $this->firstname = $this->user->firstname;
            $this->middlename = $this->user->middlename;
            $this->lastname = $this->user->lastname;
            $this->suffix = $this->user->suffix;
            $this->email = $this->user->email;
            $this->department = $this->user->department_id;
            $this->position = $this->user->position_id;
            if (!$this->user) {
                abort(404);
            }
        }
    }


    public function SaveDetail()
    {
        $this->user->firstname = $this->firstname;
        $this->user->middlename = $this->middlename;
        $this->user->lastname = $this->lastname;
        $this->user->suffix = $this->suffix;
        $this->user->email = $this->email;
        $this->user->save();

        $this->sideModal = false;
    }

    public function SaveDepartmentDetail()
    {
        $this->user->department_id = $this->department;
        $this->user->position_id = $this->position;
        $this->user->save();

        $this->sideDepartmentModal = false;
    }

    public function render()
    {
        return view('livewire.pages.user-management.user-edit-view');
    }
}
