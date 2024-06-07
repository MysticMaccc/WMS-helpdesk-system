<?php

namespace App\Livewire\Components\RequestType;

use App\Models\RequestType;
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
