<?php

namespace App\Livewire\Components\RequestTypeApprover;

use App\Models\RequestTypeApprover;
use App\ResourcesTrait;
use Livewire\Component;

class RequestTypeApproverListItemComponent extends Component
{
    use ResourcesTrait;
    public $data;
    public $requestTypeStatusData;
    public $requesttypedata;

    public function render()
    {
        return view('livewire.components.request-type-approver.request-type-approver-list-item-component');
    }

    public function destroy($hash)
    {
        $this->hardDestroyResource(RequestTypeApprover::class, $hash);
        return $this->redirectRoute('request-type-approver.create', ['hash' => $this->requesttypedata->hash]);
    }
}
