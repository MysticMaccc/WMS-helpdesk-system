<?php

namespace App\Livewire\Components\RequestTypeApprover;

use App\Models\RequestTypeApprover;
use Livewire\Component;
use Livewire\WithPagination;

class RequestTypeApproverListComponent extends Component
{
    use WithPagination;
    public $listTitle = "List of Approvers";
    public $requestTypeId;

    public function render()
    {
        $approverData = RequestTypeApprover::where('request_type_id',$this->requestTypeId)
        ->where('is_active', 1)
        ->orderBy('level','asc')
        ->paginate(4);

        return view('livewire.components.request-type-approver.request-type-approver-list-component', compact('approverData'));
    }
}
