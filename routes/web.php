<?php
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TrialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'landing'])->name('landing');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('trial', [TrialController::class, 'trial']) ->name('trial');

