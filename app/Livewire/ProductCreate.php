<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Novo Produto')]
class ProductCreate extends Component
{
    public Product $product;

    public string $name;

    public string $price;

    public function mount()
    {
        $this->product = new Product();
    }

    public function render()
    {
        return view('livewire.product-create');
    }

    public function store()
    {
        $this->validate();

        if (str_contains($this->price, ',')) {
            $this->product->price = str_replace(',', '', str_replace('.', '', $this->price));
        } else {
            $this->product->price = $this->price;
        }

        $this->product->name = $this->name;
        $this->product->image = '/images/products/produto-'.rand(1, 9).'.png';

        $this->product->save();

        session()->flash('message', 'Produto atualizado com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('products');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'price' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Qual o nome?',
            'price.required' => 'Qual o preço?',
        ];
    }
}
