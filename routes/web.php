<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SAdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




//user  3
Route::middleware(['auth', 'UserMiddleware', 'verified'])->group(function(){

    route::get('dashboard', [UserController::class,'index'])->name('dashboard');
});

//admin 2
Route::middleware(['auth', 'AdminMiddleware', 'verified'])->group(function(){

    route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin.dashboard');
});

//SAdmin 1
Route::middleware(['auth','SAdminMiddleware', 'verified'])->group(function(){
    Route::get('/super/admin/dashboard', [SAdminController::class,'index'])->name('super.admin.dashboard');
});