<?php

use App\Livewire\Pages\Login\LogIn;
use App\Livewire\Pages\Request\RequestView;
use App\Livewire\Pages\RequestType\CreateRequestTypeView;
use App\Livewire\Pages\RequestType\RequestTypeView;
use App\Livewire\Pages\UserRole\UserRoleView;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::prefix('signin')->as('signin.')->group(function(){
        Route::get('index', LogIn::class)->name('index');
    });
});


Route::middleware(['auth:sanctum','WMSAuthentication'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('request')->as('request.')->group(function(){
        Route::get('index', RequestView::class)->name('index');
    });

    Route::prefix('request-type')->as('request-type.')->group(function(){
        Route::get('index', RequestTypeView::class)->name('index');
        Route::get('create', CreateRequestTypeView::class)->name('create');
        Route::get('edit/{hash}', CreateRequestTypeView::class)->name('edit');
    });

    Route::prefix('user-role')->as('user-role.')->group(function(){
        Route::get('index', UserRoleView::class)->name('index');
    });
});


