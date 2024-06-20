<?php

namespace App\Livewire\Pages\Position;

use App\Models\Company;
use App\Models\positions;
use App\ResourcesTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditPosition extends Component
{
    use ResourcesTrait;
    #[Layout('layouts.app')]
    public $item;
    public $title = 'Edit Position';
    public $hash;
    #[Validate([
        'position' => 'required|min:2',
        'company' => 'required',
    ])]
    public $company;
    public $position;

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $this->item = positions::where('hash', $hash)->first();
            if (!$this->item) {
                abort(404);
            }
            $this->position = $this->item->name;
            $this->company = $this->item->company->id;
        }
    }

    public function store()
    {
        if (Auth::user()->user_type_id != 1) {
            $this->validate([
                'position' => 'required|min:2',
            ]);
        } else {
            $this->validate();
        }

        $this->storeResource(positions::class, [
            'name' => $this->position,
            'company_id' => Auth::user()->user_type_id == 1 ?  $this->company : Auth::user()->company_id,
        ]);
        return $this->redirectRoute('position.index', navigate: true);
    }

    public function update()
    {
        if (Auth::user()->user_type_id != 1) {
            $this->validate([
                'position' => 'required|min:2',
            ]);
        } else {
            $this->validate();
        }

        $data = [
            'name' => $this->position,
            'company_id' => Auth::user()->user_type_id == 1 ?  $this->company : Auth::user()->company_id,
        ];
        positions::updateData($this->hash, $data);

        return $this->redirectRoute('position.index', navigate: true);
    }



    public function destroy($hash)
    {
        $this->destroyResource(positions::class, $hash);
        return $this->redirectRoute('position.index', navigate: true);
    }

    public function render()
    {
        $companyData = Company::where('is_active', 1)->orderBy('name', 'asc')->get();

        return view('livewire.pages.position.edit-position', compact('companyData'));
    }
}
