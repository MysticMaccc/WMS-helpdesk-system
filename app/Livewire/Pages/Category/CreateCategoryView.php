<?php

namespace App\Livewire\Pages\Category;

use App\Models\Category;
use App\ResourcesTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCategoryView extends Component
{
    use ResourcesTrait;
    public $title = "Create Category";
    public $hash;

    #[Validate([
        'category' => 'required|min:2',
    ])]
    public $category;

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $categoryData = Category::where('hash', $hash)->first();
            if (!$categoryData) {
                abort(404);
            }
            $this->category = $categoryData->name;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.category.create-category-view');
    }

    public function store()
    {
        $this->validate();
        $this->storeResource(Category::class, [
            'name' => $this->category,
        ]);
        return $this->redirectRoute('category.index', navigate: true);
    }

    public function update()
    {
        $this->validate();
        $this->updateResource(Category::class, [
            'name' => $this->category,
        ]);
        return $this->redirectRoute('category.index', navigate: true);
    }

    public function destroy($hash)
    {
        $this->destroyResource(Category::class, $hash);
        return $this->redirectRoute('category.index', navigate: true);
    }
}
