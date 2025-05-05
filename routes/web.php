<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\ParlimentController;
use App\Http\Controllers\Admin\DunController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // User Management Routes
    Route::get('/user', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('admin.users.update');
    
    // Malaysian Administrative System Routes
    Route::prefix('malaysia')->name('admin.malaysia.')->group(function () {
        // States Routes
        Route::get('/states', [StateController::class, 'index'])->name('states.index');
        Route::get('/states/create', [StateController::class, 'create'])->name('states.create');
        Route::post('/states', [StateController::class, 'store'])->name('states.store');
        Route::get('/states/{state}/edit', [StateController::class, 'edit'])->name('states.edit');
        Route::put('/states/{state}', [StateController::class, 'update'])->name('states.update');
        Route::delete('/states/{state}', [StateController::class, 'destroy'])->name('states.destroy');
        
        // District Routes
        Route::get('/districts', [DistrictController::class, 'index'])->name('districts.index');
        Route::get('/districts/create', [DistrictController::class, 'create'])->name('districts.create');
        Route::post('/districts', [DistrictController::class, 'store'])->name('districts.store');
        Route::get('/districts/{district}/edit', [DistrictController::class, 'edit'])->name('districts.edit');
        Route::put('/districts/{district}', [DistrictController::class, 'update'])->name('districts.update');
        Route::delete('/districts/{district}', [DistrictController::class, 'destroy'])->name('districts.destroy');
        
        // Parliment Routes
        Route::get('/parlimens', [ParlimentController::class, 'index'])->name('parlimens.index');
        Route::get('/parlimens/create', [ParlimentController::class, 'create'])->name('parlimens.create');
        Route::post('/parlimens', [ParlimentController::class, 'store'])->name('parlimens.store');
        Route::get('/parlimens/{parlimen}/edit', [ParlimentController::class, 'edit'])->name('parlimens.edit');
        Route::put('/parlimens/{parlimen}', [ParlimentController::class, 'update'])->name('parlimens.update');
        Route::delete('/parlimens/{parlimen}', [ParlimentController::class, 'destroy'])->name('parlimens.destroy');
        
        // DUN (State Constituency) Routes
        Route::get('/duns', [DunController::class, 'index'])->name('duns.index');
        Route::get('/duns/create', [DunController::class, 'create'])->name('duns.create');
        Route::post('/duns', [DunController::class, 'store'])->name('duns.store');
        Route::get('/duns/{dun}/edit', [DunController::class, 'edit'])->name('duns.edit');
        Route::put('/duns/{dun}', [DunController::class, 'update'])->name('duns.update');
        Route::delete('/duns/{dun}', [DunController::class, 'destroy'])->name('duns.destroy');
    });
});

require __DIR__.'/auth.php';
