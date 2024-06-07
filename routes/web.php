<?php

use App\Livewire\Pages\Category\CategoryView;
use App\Livewire\Pages\Category\CreateCategoryView;
use App\Livewire\Pages\Department\CreateDepartmentView;
use App\Livewire\Pages\Department\DepartmentView;
use App\Livewire\Pages\Login\LogIn;
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
use Illuminate\Support\Facades\Route;

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

    Route::prefix('request')->as('request.')->group(function () {
        Route::get('index', RequestView::class)->name('index');
        Route::get('create', CreateRequestView::class)->name('create');
        Route::get('edit/{hash}', CreateRequestView::class)->name('edit');
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
    });

    Route::prefix('department')->as('department.')->group(function () {
        Route::get('index', DepartmentView::class)->name('index');
        Route::get('create', CreateDepartmentView::class)->name('create');
        Route::get('edit/{hash}', CreateDepartmentView::class)->name('edit');
    });
});
