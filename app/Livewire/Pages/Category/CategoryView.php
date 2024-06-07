<?php

namespace App\Livewire\Pages\Category;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CategoryView extends Component
{
    public $title = "Category Maintenance";
    public $actionMessage = true;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.category.category-view');
    }

    public function destroyRequestMessage()
    {
        $this->actionMessage = false;
    }
}
