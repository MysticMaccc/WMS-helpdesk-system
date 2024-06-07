<?php

namespace App\Livewire\Components\Request;

use App\Models\Attachment;
use Livewire\Component;

class AttachmentListComponent extends Component
{
    public $data;

    public function render()
    {
        $attachmentData = Attachment::where('reference_number', $this->data->reference_number)->get();
        return view('livewire.components.request.attachment-list-component', compact('attachmentData'));
    }
}
