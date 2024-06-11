<?php

namespace App\Livewire\Components\Request;

use App\Models\Category;
use App\Models\Department;
use App\Models\Request;
use App\Models\RequestType;
use App\Models\RequestTypeStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RequestListComponent extends Component
{
    use WithPagination;
    public $listTitle = "Request List";
    public $status;
    public $assignedTo;
    public $department;
    public $category;
    public $requestType;
    public $search;

    public function render()
    {
        $query = Request::query();
        if (!empty($this->search)) {
            $query->where('reference_number', 'LIKE', '%' . $this->search . '%');
        }
        if (!empty($this->requestType)) {
            $query->where('request_type_id', 'LIKE', '%' . $this->requestType . '%');
        }
        if (!empty($this->status)) {
            $query->where('status_id', 'LIKE', '%' . $this->status . '%');
        }
        if (!empty($this->assignedTo)) {
            $query->where('assigned_user_id', 'LIKE', '%' . $this->assignedTo . '%');
        }
        if (!empty($this->department)) {
            $query->where('department_id', 'LIKE', '%' . $this->department . '%');
        }
        if (!empty($this->category)) {
            $query->whereHas('request_type', function ($query) {
                $query->where('category_id', 'LIKE', '%' . $this->category . '%');
            });
        }
        $requestData = $query->where('is_active', 1)
            ->where('company_id', Auth::user()->company_id)
            ->where('department_id', Auth::user()->department_id)
            ->orderBy('id', 'desc')
            ->paginate(7);

        $assignedPersonnelData = $requestData->filter(function ($item) {
            return !is_null($item->assigned_user_id);
        })->map(function ($item) {
            return (object) [
                'id' => $item->assigned_to->id,
                'name' => $item->assigned_to->name,
            ];
        });

        $departmentData = Department::where('is_active', 1)->orderBy('name', 'asc')->get();
        $statusData = RequestTypeStatus::where('is_active', 1)->orderBy('id', 'asc')->get();
        $categoryData = Category::where('is_active', 1)->orderBy('name', 'asc')->get();
        $requestTypeData = RequestType::where('is_active', 1)->orderBy('name', 'asc')->get();

        return view(
            'livewire.components.request.request-list-component',
            compact(
                'requestData',
                'statusData',
                'assignedPersonnelData',
                'departmentData',
                'categoryData',
                'requestTypeData'
            )
        );
    }

    public function create()
    {
        return $this->redirectRoute('request.create', navigate: true);
    }
}
