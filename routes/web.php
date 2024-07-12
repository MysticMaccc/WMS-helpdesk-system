<?php

use App\Livewire\Components\Request\GenerateForm\GenerateRequestForm;
use App\Livewire\Components\UserManagement\UserCrudComponent;
use App\Livewire\Pages\Category\CategoryView;
use App\Livewire\Pages\Category\CreateCategoryView;
use App\Livewire\Pages\Company\CompanyView;
use App\Livewire\Pages\Company\CreateCompanyView;
use App\Livewire\Pages\Dashboard\DashboardView;
use App\Livewire\Pages\Department\CreateDepartmentView;
use App\Livewire\Pages\Department\DepartmentView;
use App\Livewire\Pages\Login\LogIn;
use App\Livewire\Pages\Position\EditPosition;
use App\Livewire\Pages\Position\PositionView;
use App\Livewire\Pages\Request\CreateRequestView;
use App\Livewire\Pages\Request\RequestView;
use App\Livewire\Pages\RequestType\CreateRequestTypeView;
use App\Livewire\Pages\RequestType\RequestTypeView;
use App\Livewire\Pages\RequestTypeApprover\CreateRequestTypeApproverView;
use App\Livewire\Pages\RequestTypeStatus\CreateRequestTypeStatusView;
use App\Livewire\Pages\RequestTypeStatus\RequestTypeStatusView;
use App\Livewire\Pages\UserManagement\UserEditView;
use App\Livewire\Pages\UserManagement\UserView;
use App\Livewire\Pages\UserRole\UserRoleView;
use App\Livewire\Pages\UserType\UserTypeCreate;
use App\Livewire\Pages\UserType\UserTypeEdit;
use App\Livewire\Pages\UserType\UserTypeView;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    // Route::prefix('signin')->as('signin.')->group(function(){
    //     Route::get('index', LogIn::class)->name('index');
    // });

    Route::get('login', LogIn::class)->name('login');
});


Route::middleware(['auth:sanctum', 'WMSAuthentication'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('dashboard')->as('dashboard.')->group(function () {
        Route::get('index', DashboardView::class)->name('index');
    });

    Route::prefix('request')->as('request.')->group(function () {
        Route::get('index', RequestView::class)->name('index');
        Route::get('create', CreateRequestView::class)->name('create');
        Route::get('edit/{hash}', CreateRequestView::class)->name('edit');
        Route::get('generate-form/{hash}', [GenerateRequestForm::class, 'generateRequest'])->name('generate-form');
    });

    Route::prefix('position')->as('position.')->group(function () {
        Route::get('index', PositionView::class)->name('index');
        Route::get('create', EditPosition::class)->name('create');
        Route::get('edit/{hash}', EditPosition::class)->name('edit-position');
    });

    Route::prefix('user-type')->as('user-type.')->group(function () {
        Route::get('index', UserTypeView::class)->name('index');
        Route::get('create', UserTypeCreate::class)->name('create');
        Route::get('edit/{hash}', UserTypeCreate::class)->name('edit');
    });

    Route::prefix('request-type')->as('request-type.')->group(function () {
        Route::get('index', RequestTypeView::class)->name('index');
        Route::get('create', CreateRequestTypeView::class)->name('create');
        Route::get('edit/{hash}', CreateRequestTypeView::class)->name('edit');
    });

    Route::prefix('request-type-status')->as('request-type-status.')->group(function () {
        Route::get('index', RequestTypeStatusView::class)->name('index');
        Route::get('create', CreateRequestTypeStatusView::class)->name('create');
        Route::get('edit/{hash}', CreateRequestTypeStatusView::class)->name('edit');
    });

    Route::prefix('category')->as('category.')->group(function () {
        Route::get('index', CategoryView::class)->name('index');
        Route::get('create', CreateCategoryView::class)->name('create');
        Route::get('edit/{hash}', CreateCategoryView::class)->name('edit');
    });

    Route::prefix('request-type-approver')->as('request-type-approver.')->group(function () {
        // Route::get('index', CategoryView::class)->name('index');
        Route::get('create/{hash}', CreateRequestTypeApproverView::class)->name('create');
        // Route::get('edit/{hash}', CreateCategoryView::class)->name('edit');
    });

    Route::prefix('user-role')->as('user-role.')->group(function () {
        Route::get('index', UserRoleView::class)->name('index');
    });

    Route::prefix('user-management')->as('user-management.')->group(function () {
        Route::get('index', UserView::class)->name('index');
        Route::get('edit/{hash}', UserEditView::class)->name('edit');
        Route::get('create', UserCrudComponent::class)->name('create');
    });

    Route::prefix('department')->as('department.')->group(function () {
        Route::get('index', DepartmentView::class)->name('index');
        Route::get('create', CreateDepartmentView::class)->name('create');
        Route::get('edit/{hash}', CreateDepartmentView::class)->name('edit');
    });

    Route::prefix('company')->as('company.')->group(function () {
        Route::get('index', CompanyView::class)->name('index');
        Route::get('create', CreateCompanyView::class)->name('create');
        Route::get('edit/{hash}', CreateCompanyView::class)->name('edit');
    });
});
