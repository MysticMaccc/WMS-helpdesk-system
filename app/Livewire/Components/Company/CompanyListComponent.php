<?php

namespace App\Livewire\Components\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyListComponent extends Component
{
    use WithPagination;
    public $listTitle = "Company List";
    public $search;

    public function render()
    {
        $query = Company::orderBy('name', 'asc');

        if (!empty($this->search)) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
        }
        $companyData = $query->paginate(7);

        return view('livewire.components.company.company-list-component', compact('companyData'));
    }

    public function create()
    {
        return $this->redirectRoute('company.create', navigate: true);
    }
}
