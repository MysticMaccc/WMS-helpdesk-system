<?php

namespace App\Livewire\Components\UserType;

use App\Models\UserTypes;
use Livewire\Component;
use Livewire\WithPagination;

class UserTypeListComponent extends Component
{
    use WithPagination;
    public $listTitle = "User Type list";
    public $search;

    public function render()
    {
        $userTypeData = UserTypes::where('is_active', 1)->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
        })->orderBy('name', 'asc')->paginate(10);
        return view('livewire.components.user-type.user-type-list-component', compact('userTypeData'));
    }

    public function create()
    {
        return $this->redirectRoute('user-type.create', navigate: true);
    }
}
