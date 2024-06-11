<?php

namespace App\Livewire\Components\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryListComponent extends Component
{
    use WithPagination;
    public $listTitle = "Category List";
    public $search;

    public function render()
    {
        $categoryData = Category::where('is_active', true)
        ->where('company_id', Auth::user()->company_id)
        ->where(function($query){
            $query->where('name','LIKE','%'.$this->search.'%');
        })
        ->orderBy('name', 'asc')->paginate(7);

        return view('livewire.components.category.category-list-component', compact('categoryData'));
    }

    public function create()
    {
        return $this->redirectRoute('category.create', navigate:true);
    }
}
