<?php

namespace App\Livewire\Components\RequestType;

use App\Models\RequestType;
use Livewire\Component;
use Livewire\WithPagination;

class RequestTypeListComponent extends Component
{
    use WithPagination;
    public $listTitle = "Request Type List";

    public function render()
    {
        $requestTypeData = RequestType::IsActive()->paginate(10);
        return view('livewire.components.request-type.request-type-list-component', compact('requestTypeData'));
    }

    public function create()
    {
        return $this->redirectRoute('request-type.create', navigate:true);
    }
}
