<?php

namespace App\Livewire\Components\Request\GenerateForm;

use App\Models\Request;
use App\Models\RequestDetail;
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

        $requestData = Request::where('hash', $hash_id)->where('is_active', true)->first();
        $detailData = RequestDetail::where('reference_number', $requestData->reference_number)->orderBy('id', 'asc')->get();

        $data = [
            'requestData' => $requestData,
            'detailData' => $detailData
        ];

        $pdf = Pdf::loadView('livewire.components.request.generate-form.generate-request-form', $data);
        return $pdf->stream();
    }
}
