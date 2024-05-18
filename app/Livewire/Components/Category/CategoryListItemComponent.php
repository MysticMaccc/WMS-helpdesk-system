<?php

namespace App\Livewire\Components\Category;

use Livewire\Component;

class CategoryListItemComponent extends Component
{
    public $data;

    public function render()
    {
        return view('livewire.components.category.category-list-item-component');
    }
}
