<?php

namespace App\Livewire\System\Notification;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationListComponent extends Component
{
    public function render()
    {
        $notificationData = Notification::where('for_user', Auth::user()->id)
        ->orderBy('created_at', 'asc')
        ->get();

        return view('livewire.system.notification.notification-list-component', compact('notificationData'));
    }

}
