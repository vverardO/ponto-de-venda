<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component as LivewireComponent;

#[Title('Ponto de Venda')]
class PointOfSale extends LivewireComponent
{
    public User $user;

    #[Url(except: '', as: 'pesquisa')]
    public string $search = '';

    public function mount()
    {
        $this->cart = collect([]);
    }

    public function render()
    {
        $products = Product::when($this->search, function ($query) {
            return $query->where('name', 'like', "%$this->search%");
        })->get();

        return view('livewire.point-of-sale')
            ->with('products', $products);
    }
}
