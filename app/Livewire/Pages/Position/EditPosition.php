<?php

namespace App\Livewire\Pages\Position;

use App\Models\positions;
use App\ResourcesTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditPosition extends Component
{   
    use ResourcesTrait;
    #[Layout('layouts.app')]
    public $item;
    public $title = 'Edit Position';
    public $position;
    public $hash;

    #[Validate([
        'position' => 'required|min:2',
    ])]
    public function mount($hash = null){
        if ($hash != null) {
            $this->hash = $hash;
            $this->item = positions::where('hash', $hash)->first();
            if (!$this->item) {
                abort(404);
            }
            $this->position = $this->item->name;
        }
    }

    public function store()
    {
        $this->validate();
        $this->storeResource(positions::class, [
            'name' => $this->position,
        ]);
        return $this->redirectRoute('position.index', navigate: true);
    }

    public function update()
    {
        $this->validate();
        $data = [
            'name' => $this->position
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
        return view('livewire.pages.position.edit-position');
    }
}
