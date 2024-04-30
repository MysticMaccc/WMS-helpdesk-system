<?php

use App\Livewire\Pages\Request\RequestView;
use App\Livewire\Pages\UserRole\UserRoleView;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('request')->as('request.')->group(function(){
        Route::get('index', RequestView::class)->name('index');
    });

    Route::prefix('user-role')->as('user-role.')->group(function(){
        Route::get('index', UserRoleView::class)->name('index');
    });

});
