<?php

namespace App\Livewire\Pages\UserType;

use App\Models\User;
use App\Models\UserTypes;
use App\ResourcesTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserTypeCreate extends Component
{
    use ResourcesTrait;
    public $title = "Create User Type";
    public $hash;
    public $users;
    public $userType;
    #[Validate([
        'userType' => 'required|min:2',
    ])]

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $userTypeData = UserTypes::where('hash', $hash)->first();
            if (!$userTypeData) {
                abort(404);
            }
            $this->userType = $userTypeData->name;
        }

        $this->users = User::where('is_active', 1)->get();
    }

    public function store()
    {
        $this->validate();
        $this->storeResource(UserTypes::class, [
            'name' => $this->userType,
        ]);
        return $this->redirectRoute('user-type.index', navigate: true);
    }

    public function update()
    {
        $this->validate();
        $this->updateResource(UserTypes::class, [
            'name' => $this->userType,
        ]);
        return $this->redirectRoute('user-type.index', navigate: true);
    }

    public function destroy($hash)
    {
        $this->destroyResource(UserTypes::class, $hash);
        return $this->redirectRoute('user-type.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.user-type.user-type-create');
    }
}
