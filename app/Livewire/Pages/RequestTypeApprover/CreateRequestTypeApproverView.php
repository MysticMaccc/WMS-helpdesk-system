<?php

namespace App\Livewire\Pages\RequestTypeApprover;

use App\Models\RequestType;
use App\Models\RequestTypeApprover;
use App\Models\RequestTypeStatus;
use App\Models\User;
use App\ResourcesTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateRequestTypeApproverView extends Component
{
    use ResourcesTrait;
    public $title = "Assign Approver";
    public $hash;
    public $requestTypeData;
    #[Validate([
        'user' => 'required',
        'requestTypeStatus' => 'required',
        'level' => 'required|integer|min:1|max:10'
    ])]
    public $user;
    public $requestTypeStatus;
    public $level;
    public $actionMessage = true;

    public function mount($hash = null)
    {
        if ($hash != null) {

            $this->hash = $hash;
            $requestTypeData = RequestType::where('hash', $hash)->where('is_active', 1)->first();
            if (!$requestTypeData) {
                abort(404);
            }
            $this->requestTypeData = $requestTypeData;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $userData = User::where('is_active', true)->orderBy('firstname', 'asc')->get();
        $requestTypeStatusData = RequestTypeStatus::where('is_active', 1)->orderBy('id', 'asc')->get();

        return view('livewire.pages.request-type-approver.create-request-type-approver-view', compact('userData', 'requestTypeStatusData'));
    }

    public function store()
    {
        $this->validate();
        $this->storeResource(
            RequestTypeApprover::class,
            [
                'request_type_id' => $this->requestTypeData->id,
                'user_id' => $this->user,
                'request_type_status_id' => $this->requestTypeStatus,
                'level' => $this->level,
            ],
            'Process '.$this->level.' already has approver! '
        );
        return $this->redirectRoute('request-type-approver.create', ['hash' => $this->hash], navigate: true);
    }

    public function destroyRequestMessage()
    {
        $this->actionMessage = false;
    }
}
