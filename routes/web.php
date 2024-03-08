<?php

use App\Http\Controllers\FallbackController;
use App\Livewire\Authentication\Login;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::fallback(FallbackController::class);
Route::get('/acessar', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/bem-vindo', Welcome::class)->name('welcome');
});
