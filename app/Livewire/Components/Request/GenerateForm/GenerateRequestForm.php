<?php

namespace App\Livewire\Components\Request\GenerateForm;

use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class GenerateRequestForm extends Component
{
    public function render()
    {
        return view('livewire.components.request.generate-form.generate-request-form');
    }


    public function generateRequest($hash_id)
    {
        $data = [
            'hash_id' => $hash_id,
        ];

        $pdf = Pdf::loadView('livewire.components.request.generate-form.generate-request-form', $data);
        return $pdf->stream();
    }
}
