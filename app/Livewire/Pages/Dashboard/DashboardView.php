<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DashboardView extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        $aprroveRequestData = Request::where('status_id', 2)->where('company_id', Auth::user()->company_id)->where('is_active', 1)->get();
        $assignRequestData = Request::where('status_id', 3)->where('company_id', Auth::user()->company_id)->where('is_active', 1)->get();
        $onProgressRequestData = Request::where('status_id', 4)->where('company_id', Auth::user()->company_id)->where('is_active', 1)->get();
        $completedRequestData = Request::where('status_id', 5)->where('company_id', Auth::user()->company_id)->where('is_active', 1)->get();
        $reviewCompletedRequestData = Request::where('status_id', 6)->where('company_id', Auth::user()->company_id)->where('is_active', 1)->get();
        $aprroveCompletedRequestData = Request::where('status_id', 7)->where('company_id', Auth::user()->company_id)->where('is_active', 1)->get();
        $closedRequestData = Request::where('status_id', 8)->where('company_id', Auth::user()->company_id)->where('is_active', 1)->get();

        return view(
            'livewire.pages.dashboard.dashboard-view',
            compact(
                'aprroveRequestData',
                'assignRequestData',
                'onProgressRequestData',
                'completedRequestData',
                'reviewCompletedRequestData',
                'aprroveCompletedRequestData',
                'closedRequestData'
            )
        );
    }
}
