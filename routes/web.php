<?php

use App\Http\Controllers\FallbackController;
use App\Http\Middleware\Authenticate;
use App\Livewire\CreateUser;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\PointOfSale;
use App\Livewire\ProductCreate;
use App\Livewire\Products;
use App\Livewire\ProductUpdate;
use App\Livewire\Profile;
use App\Livewire\Sales;
use App\Livewire\ShowSale;
use App\Livewire\UpdateUser;
use App\Livewire\Users;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::fallback(FallbackController::class);
Route::get('/acessar', Login::class)->name('login');

Route::middleware(Authenticate::class)->group(function () {
    //@todo working around to deal with two user types on mvp
    Route::get('/bem-vindo', function () {
        if (auth()->user()->type == 'manager') {
            return redirect(route('dashboard'), Response::HTTP_PERMANENTLY_REDIRECT);
        }

        return redirect(route('point-of-sale'), Response::HTTP_PERMANENTLY_REDIRECT);
    })->name('welcome');

    Route::get('/ponto-de-venda', PointOfSale::class)->name('point-of-sale');
    Route::get('/vendas', Sales::class)->name('sales');
    Route::get('/vendas/{sale}', ShowSale::class)->name('show-sale');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/perfil', Profile::class)->name('profile');
    Route::get('/usuarios', Users::class)->name('users');
    Route::get('/usuarios/{user}', UpdateUser::class)->name('update-user');
    Route::get('/usuario', CreateUser::class)->name('create-user');
    Route::get('/produtos', Products::class)->name('products');
    Route::get('/produtos/{product}', ProductUpdate::class)->name('product-update');
    Route::get('/produto', ProductCreate::class)->name('product-create');
});
