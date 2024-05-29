<?php

namespace App\Livewire\Pages\Request;

use App\Models\Request;
use App\Models\RequestType;
use App\Models\RequestTypeApprover;
use App\Models\RequestUpdateLog;
use App\Models\User;
use App\ResourcesTrait;
use App\UtilitiesTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public $nextStatusData;
    public $requestData;
    #[Validate([
        'requestType' => 'required',
        'details' => 'required|min:10|max:500',
        'cost' => 'nullable|numeric',
    ])]
    public $requestType;
    public $details;
    public $cost;
    public $assignTo;

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $this->requestData = Request::where('hash', $this->hash)->where('is_active', true)->first();
            if (!$this->requestData) {
                abort(404);
            }
            //properties for updating
            $this->nextStatusData = $this->requestData->request_type->request_type_approver
                ->where('request_type_status_id', '>', $this->requestData->status_id)->first();
            //end of properties for updating
            // dd($this->nextStatusData->request_type_status->id);

            $this->subTitle = "Reference No.";
            $this->description =  $this->requestData->reference_number;
            $this->title = $this->requestData->status->name;
            $this->requestType = $this->requestData->request_type_id;
            $this->details = $this->requestData->details;
            $this->cost = $this->requestData->cost;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $requestTypeData = RequestType::where('department_id', Auth::user()->department_id)
            ->where('is_active', true)
            ->whereHas('request_type_approver')
            ->get();
        $userData = User::where('is_active', 1)->orderBy('firstname', 'asc')->get();
        return view('livewire.pages.request.create-request-view', compact('requestTypeData', 'userData'));
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
        $transaction = DB::transaction(function () {
            $requestLogAttributes = [
                'request_id' => $this->requestData->id,
                'status_id' => $this->requestData->status_id,
            ];

            if ($this->requestData->status_id == 3) { //assign
                $this->validate([
                    'assignTo' => 'required',
                ]);
                $requestAttributes = [
                    'status_id' => $this->nextStatusData->request_type_status->id,
                    'assigned_user_id' => $this->assignTo,
                ];
            } else {
                $requestAttributes = [
                    'status_id' => $this->nextStatusData->request_type_status->id
                ];
            }

            $this->storeResource(RequestUpdateLog::class, $requestLogAttributes);
            $this->updateResource(Request::class, $requestAttributes);
        });

        if (!$transaction) {
            session()->flash('error', 'Updating request failed!');
        }

        session()->flash('success', 'Request updated successfully!');
        return $this->redirectRoute('request.index', navigate: true);
    }
}
