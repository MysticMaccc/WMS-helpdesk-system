<?php

namespace App\Livewire\Pages\UserManagement;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserEditView extends Component
{
    public $hash, $user;
    #[Layout('layouts.app')]

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $this->user = User::where('hash', $hash)->first();
            if (!$this->user) {
                abort(404);
            }
        }
    }
    public function render()
    {
        return view('livewire.pages.user-management.user-edit-view');
    }
}
