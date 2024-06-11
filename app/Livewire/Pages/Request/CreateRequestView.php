<?php

namespace App\Livewire\Pages\Request;

use App\Models\Attachment;
use App\Models\Notification;
use App\Models\Request;
use App\Models\RequestDetail;
use App\Models\RequestType;
use App\Models\RequestTypeApprover;
use App\Models\RequestUpdateLog;
use App\Models\User;
use App\ResourcesTrait;
use App\UtilitiesTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateRequestView extends Component
{
    use UtilitiesTrait;
    use ResourcesTrait;
    use WithFileUploads;
    public $title = "Create Request";
    public $subTitle = "Request Form";
    public $description = "Here you can create your request.";
    public $hash;
    public $nextStatusData;
    public $requestData;
    public $disableRequestType = false;
    #[Validate([
        'requestType' => 'required',
        'details.*' => 'required|min:5|max:500',
        'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
    ])]
    public $requestType;
    public $details = [];
    public $cost = [];
    public $detailId = [];
    public $assignTo;
    public $attachments = [];

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $this->requestData = Request::where('hash', $this->hash)->where('is_active', true)->first();
            $detailData = RequestDetail::where('reference_number', $this->requestData->reference_number)->orderBy('id', 'asc')->get();

            if (!$this->requestData) {
                abort(404);
            }
            //properties for updating
            $this->nextStatusData = $this->requestData->request_type->request_type_approver
                ->where('request_type_status_id', '>', $this->requestData->status_id)->first();
            //end of properties for updating
            $this->disableRequestType = true;
            $this->subTitle = "Reference No.";
            $this->description =  $this->requestData->reference_number;
            $this->title = $this->requestData->status->name;
            $this->requestType = $this->requestData->request_type_id;
            $this->details = $this->requestData->details;
            $this->cost = $this->requestData->cost;

            if ($detailData) {
                foreach ($detailData as $detail) {
                    $this->details[] = $detail->details;
                    $this->cost[] = $detail->cost;
                    $this->detailId[] = $detail->id;
                }
            }
        } else {
            // Initialize with one empty row
            $this->addRow();
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $requestTypeData = RequestType::where('department_id', Auth::user()->department_id)
            ->where('company_id', Auth::user()->company_id)
            ->where('is_active', true)
            ->whereHas('request_type_approver')
            ->get();

        $userData = User::where('is_active', 1)->orderBy('firstname', 'asc')->get();
        return view('livewire.pages.request.create-request-view', compact('requestTypeData', 'userData'));
    }

    public function addRow()
    {
        $this->details[] = '';
        $this->cost[] = '';
    }

    public function removeRow($index)
    {
        unset($this->details[$index]);
        unset($this->cost[$index]);

        $this->details = array_values($this->details);
        $this->cost = array_values($this->cost);
    }

    public function updatedRequestType($value)
    {
        $nextApproverData = RequestTypeApprover::where('request_type_id', $value)
            ->where('level', 2)
            ->first();
        $this->nextStatusData = $nextApproverData;
    }

    public function store()
    {
        $this->validate();

        DB::transaction(
            function () {

                $statusId = RequestTypeApprover::where('request_type_id', $this->requestType)
                    ->where('level', 1)
                    ->first();

                $referenceNumber = $this->generateReferenceNumber();

                foreach ($this->attachments as $attachment) {
                    $fileName = $attachment->hashName();
                    $attachment->storeAs('public/attachments', $fileName);
                    $this->storeResource(Attachment::class, [
                        'reference_number' => $referenceNumber,
                        'name' => $fileName,
                        'filepath' => $fileName,
                    ]);
                }

                $attributes = [
                    'company_id' => Auth::user()->company_id,
                    'department_id' => Auth::user()->department_id,
                    'request_type_id' => $this->requestType,
                    'user_id' => Auth::user()->id,
                    'reference_number' => $referenceNumber,
                    'status_id' => $statusId->request_type_status_id
                ];

                //store queries
                $this->storeResource(Request::class, $attributes);

                foreach ($this->details as $index => $detail) {
                    $this->storeResource(RequestDetail::class, [
                        'reference_number' => $referenceNumber,
                        'details' => $detail,
                    ]);
                }

                $this->storeNotification($this->nextStatusData->user_id, 'New Request Created', $referenceNumber, 'request.index');
                //store queries end

            },
            3
        );

        return $this->redirectRoute('request.index', navigate: true);
    }

    public function update()
    {
        $transaction = DB::transaction(function () {

            Gate::authorize('authorizeRequest', [
                $this->nextStatusData->request_type_id,
                $this->nextStatusData->request_type_status->id
            ]);

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
            $this->storeNotification(
                $this->nextStatusData->user_id,
                $this->nextStatusData->request_type_status->name,
                $this->requestData->reference_number,
                'request.edit',
                $this->requestData->hash
            );
        });

        if (!$transaction) {
            session()->flash('error', 'Updating request failed!');
        }

        session()->flash('success', 'Request updated successfully!');
        return $this->redirectRoute('request.index', navigate: true);
    }

    public function storeNotification($userId, $title, $description, $url, $parameter = null)
    {
        $this->storeResource(Notification::class, [
            'for_user' => $userId,
            'title' => $title,
            'description' => $description,
            'url'  => $url,
            'parameter' => $parameter
        ]);
    }
    
}
