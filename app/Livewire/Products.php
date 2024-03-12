<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Produtos')]
class Products extends Component
{
    #[Url(except: '', as: 'pesquisa')]
    public string $search = '';

    public function render()
    {
        $products = Product::when($this->search, function ($query) {
            return $query->where('name', 'like', "%$this->search%");
        })->get();

        return view('livewire.products')
            ->with('products', $products);
    }
}
