<?php

namespace App\Livewire\Pages\Position;

use App\Models\positions;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class PositionView extends Component
{
    use WithPagination;
    public $newposition = null;
    public $actionMessage = true;
    public $title = "Position Maintenance";
    #[Layout('layouts.app')]
    public function render()
    {
        $positions = positions::getAllPositions();
        return view('livewire.pages.position.position-view', compact('positions'));
    }

    public function destroyRequestMessage()
    {
        $this->actionMessage = false;
    }

    // public function ForAddPosition(){
    //     $data = [
    //         'hash' => md5($this->newposition),
    //         'name' => $this->newposition,
    //         'is_active' => 1,
    //         'modified_by' => Auth::user()->firstname.' '.Auth::user()->lastname
    //     ];
    //     positions::createData($data);
    // }

    // public function deletePosition($hash){
    //     // dd($hash);
    //     positions::deleteData($hash);
    // }
}
