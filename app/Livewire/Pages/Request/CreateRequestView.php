<?php

namespace App\Livewire\Pages\Request;

use App\Models\Request;
use App\Models\RequestType;
use App\Models\RequestTypeApprover;
use App\ResourcesTrait;
use App\UtilitiesTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateRequestView extends Component
{
    use UtilitiesTrait;
    use ResourcesTrait;
    public $title = "Create Request";
    public $subTitle = "Request Form";
    public $description = "Here you can create your request.";
    public $hash;
    #[Validate([
        'requestType' => 'required',
        'details' => 'required|min:10|max:500',
        'cost' => 'nullable|numeric',
    ])]
    public $requestType;
    public $details;
    public $cost;

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $requestData = Request::where('hash', $this->hash)->where('is_active', true)->first();
            if (!$requestData) {
                abort(404);
            }
            $this->subTitle = "Reference No.";
            $this->description =  $requestData->reference_number;
            $this->title = $requestData->status->name;
            $this->requestType = $requestData->request_type_id;
            $this->details = $requestData->details;
            $this->cost = $requestData->cost;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $requestTypeData = RequestType::where('department_id', Auth::user()->department_id)
            ->where('is_active', true)
            ->whereHas('request_type_approver')
            ->get();

        return view('livewire.pages.request.create-request-view', compact('requestTypeData'));
    }

    public function store()
    {
        $this->validate();

        $statusId = RequestTypeApprover::where('request_type_id', $this->requestType)
            ->where('level', 1)
            ->first();

        $attributes = [
            'department_id' => Auth::user()->department_id,
            'request_type_id' => $this->requestType,
            'user_id' => Auth::user()->id,
            'reference_number' => $this->generateReferenceNumber(),
            'details' => $this->details,
            'cost' => $this->cost,
            'status_id' => $statusId->request_type_status_id
        ];
        $this->storeResource(Request::class, $attributes);

        return $this->redirectRoute('request.index', navigate: true);
    }

    public function update()
    {
    }
}
