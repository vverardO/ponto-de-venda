<?php

use App\Http\Controllers\FallbackController;
use App\Http\Middleware\Authenticate;
use App\Livewire\Authentication\Login;
use App\Livewire\Dashboard;
use App\Livewire\PointOfSale;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::fallback(FallbackController::class);
Route::get('/acessar', Login::class)->name('login');

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/bem-vindo', Welcome::class)->name('welcome');
    Route::get('/ponto-de-venda', PointOfSale::class)->name('point-of-sale');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
