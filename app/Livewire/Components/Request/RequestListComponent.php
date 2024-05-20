<?php

namespace App\Livewire\Components\Request;

use App\Models\Request;
use Livewire\Component;
use Livewire\WithPagination;

class RequestListComponent extends Component
{
    use WithPagination;
    public $listTitle = "Request List";

    public function render()
    {
        $requestData = Request::where('is_active', 1)->paginate(7);

        return view('livewire.components.request.request-list-component', compact('requestData'));
    }

    public function create()
    {
        return $this->redirectRoute('request.create', navigate:true);
    }

}
