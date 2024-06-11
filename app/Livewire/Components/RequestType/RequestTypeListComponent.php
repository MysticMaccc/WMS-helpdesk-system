<?php

namespace App\Livewire\Components\RequestType;

use App\Models\RequestType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RequestTypeListComponent extends Component
{
    use WithPagination;
    public $listTitle = "Request Type List";
    public $search;

    public function render()
    {
        $requestTypeData = RequestType::where('is_active', 1)
            ->where('company_id', Auth::user()->company_id)
            ->where('department_id', Auth::user()->department_id)
            ->whereAny(
                [
                    'name'
                ],
                'LIKE',
                '%' . $this->search . '%'
            )
            ->paginate(7);

        return view('livewire.components.request-type.request-type-list-component', compact('requestTypeData'));
    }

    public function create()
    {
        // dd('test');
        return $this->redirectRoute('request-type.create', navigate: true);
    }
}
