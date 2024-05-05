<?php

namespace App\Livewire\Components\RequestTypeStatus;

use App\Models\RequestTypeStatus;
use Livewire\Component;
use Livewire\WithPagination;

class RequestTypeStatusListComponent extends Component
{
    use WithPagination;
    public $listTitle = "Request Type Status List";

    public function render()
    {
        $requestTypeStatusData = RequestTypeStatus::where('is_active', true)->paginate(7);
        return view('livewire.components.request-type-status.request-type-status-list-component', compact('requestTypeStatusData'));
    }

    public function create()
    {
        return $this->redirectRoute('request-type-status.create', navigate:true);
    }
}
