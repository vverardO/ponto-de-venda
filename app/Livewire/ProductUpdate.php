<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductUpdate extends Component
{
    public Product $product;

    public string $name;

    public string $price;

    public function mount(Product $product)
    {
        $this->product = $product;

        $this->name = $this->product->name;
        $this->price = number_format(($this->product->price / 100), 2, ',', '');
    }

    public function render()
    {
        $title = "Produto - {$this->product->id}";

        return view('livewire.product-update')
            ->title($title);
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
