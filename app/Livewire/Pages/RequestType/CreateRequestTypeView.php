<?php

namespace App\Livewire\Pages\RequestType;

use App\Models\Category;
use App\Models\Department;
use App\Models\RequestType;
use App\ResourcesTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateRequestTypeView extends Component
{
    use ResourcesTrait;
    public $title = "Create Request Type";
    #[Validate([
        'department' => 'required',
        'category' => 'required',
        'name' => 'required|min:2|max:20'
    ])]
    public $department;
    public $category;
    public $name;
    public $hash = null;

    public function mount($hash = null)
    {
        if ($hash !== NULL) {
            $this->hash = $hash;
            $requestTypeData = RequestType::where('hash', $hash)->first();
            if(!$requestTypeData){
                abort(404,'Data do not exist!');
            }
            $this->department = $requestTypeData->department_id;
            $this->category = $requestTypeData->category_id;
            $this->name = $requestTypeData->name;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $departmentData = Department::where('is_active', 1)->get();
        $categoryData = Category::where('is_active', 1)->get();

        return view('livewire.pages.request-type.create-request-type-view', compact('departmentData', 'categoryData'));
    }

    public function store()
    {
        $this->validate();

        $this->storeResource(RequestType::class, [
            'department_id' => $this->department,
            'category_id' => $this->category,
            'name' => $this->name
        ]);

        return $this->redirectRoute('request-type.index', navigate:true);
    }

    public function update()
    {
        $this->validate();
        $this->updateResource(RequestType::class, [
            'department_id' => $this->department,
            'category_id' => $this->category,
            'name' => $this->name,
        ]);

        return $this->redirectRoute('request-type.index', navigate:true);
    }

    public function destroy($hash)
    {
        $this->destroyResource(RequestType::class, $hash);
        return $this->redirectRoute('request-type.index', navigate:true);
    }
    
}
