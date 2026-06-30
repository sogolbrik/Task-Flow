<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Admin\WorkflowController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('auth', [AuthController::class, 'auth'])->name('auth');
Route::post('auth-store', [AuthController::class, 'store'])->name('auth.store');
Route::post('auth-logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('tugas', TugasController::class);
    Route::resource('workflows', WorkflowController::class);
});
