<?php

//use App\Http\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

<<<<<<< HEAD

Route::get('/', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');


Route::middleware('admin')->group(function(){
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
=======
Route::get('/', function () {
    return view('admin/login');
});
>>>>>>> 15132e7f064333ad8a6b77aad0e087a6a55923c0
