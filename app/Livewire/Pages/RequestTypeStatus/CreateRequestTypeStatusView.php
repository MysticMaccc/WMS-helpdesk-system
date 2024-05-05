<?php

namespace App\Livewire\Pages\RequestTypeStatus;

use App\Models\RequestTypeStatus;
use App\ResourcesTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateRequestTypeStatusView extends Component
{
    use ResourcesTrait;
    public $title = "Create Request Type Status";
    public $hash;
    #[Validate([
        'name' => 'required|min:2|max:50'
    ])]
    public $name;

    public function mount($hash = null)
    {
        if($hash != null){
            $this->hash = $hash;
            $requestTypeStatusData = RequestTypeStatus::where('hash',$hash)->first();
            if(!$requestTypeStatusData){
                abort(404,'Data do not exist!');
            }

            $this->name = $requestTypeStatusData->name;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.request-type-status.create-request-type-status-view');
    }

    public function store()
    {
        $this->validate();
        $this->storeResource(RequestTypeStatus::class, [
            'name'=>$this->name
        ]);
        return $this->redirectRoute('request-type-status.index', navigate:true);
    }

    public function update()
    {
        $this->validate();
        $this->updateResource(RequestTypeStatus::class, [
            'name'=>$this->name
        ]);
        return $this->redirectRoute('request-type-status.index', navigate:true);
    }
    
    public function destroy($hash)
    {
        $this->destroyResource(RequestTypeStatus::class, $hash);
        return $this->redirectRoute('request-type-status.index', navigate:true);
    }

}
