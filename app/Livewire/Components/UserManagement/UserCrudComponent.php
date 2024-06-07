<?php

namespace App\Livewire\Components\UserManagement;

use App\Models\Department;
use App\Models\positions;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class UserCrudComponent extends Component
{
    use WithPagination;
    public $alert = false;
    public $alertMessage = ['success' => 'User has been created successfully!', 'error' => 'User has been failed to create!'];
    public $title = "User Management Create";
    public $actionMessage = true;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|string|min:8|max:255')]
    public $password;
    #[Validate('required|string|min:8|same:password')]
    public $rePassword;
    #[Validate('required')]
    public $departmentId;
    #[Validate('required')]
    public $positionId;
    #[Validate('required')]
    public $userTypeId;
    #[Validate('required')]
    public $firstName;
    #[Validate('required')]
    public $middleName;
    #[Validate('required')]
    public $lastName;
    public $suffix;

    #[Layout('layouts.app')]
    public function render()
    {
        $departmentData = Department::where('is_active', 1)->get();
        $userTypeData = UserType::where('is_active', 1)->get();
        $positionData = positions::where('is_active', 1)->get();
        $userData = User::where('is_active', 1)->paginate(10);
        return view('livewire.components.user-management.user-crud-component', compact('userData', 'departmentData', 'userTypeData', 'positionData'));
    }

    public function changeAlert(){
        $this->alert = !$this->alert;
    }

    public function store(){
        $this->validate();
        $data = [
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'department_id' => $this->departmentId,
            'user_type_id' => $this->userTypeId,
            'position_id' => $this->positionId,
            'firstname' => $this->firstName,
            'middlename' => $this->middleName,
            'lastname' => $this->lastName,
            'suffix' => $this->suffix,
        ];

        try {
            User::create($data);
        } catch (\Exception $th) {
            $this->consoleLog($th->getMessage());
        }
        
        $this->alert = true;
        $this->actionMessage = true;
    }

    public function destroyRequestMessage()
    {
        $this->actionMessage = false;
    }
}
