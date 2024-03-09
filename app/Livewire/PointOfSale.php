<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Ponto de Venda')]
class PointOfSale extends Component
{
    public User $user;

    public Collection $cart;

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

    #[On('push-to-cart')]
    public function pushToCart(
        Product $product
    ): void {
        $this->cart->put($product->id, [
            'quantity' => 1,
            'price' => $product->price,
            'price_formatted' => $product->price_formatted,
        ]);
    }

    #[On('remove-from-cart')]
    public function removeFromCart(
        Product $product
    ): void {
        $this->cart->forget($product->id);
    }

    #[On('close-cart')]
    public function closeCart(): void
    {
        $this->cart = collect([]);

        $this->dispatch(
            'alert',
            type: 'success',
            message: 'Venda limpa com sucesso!'
        );
    }

    #[On('increment-quantity')]
    public function incrementQuantity(
        Product $product
    ): void {
        $quantity = $this->cart->get($product->id)['quantity'];
        $quantity++;
        $price = ($product->price) * $quantity;

        $this->cart->put(
            $product->id, [
                'quantity' => $quantity,
                'price' => $price,
                'price_formatted' => number_format(($price / 100), 2, ',', '.'),
            ]);
    }

    #[On('finish-cart')]
    public function finishCart(): void
    {
        $totalAmount = $this->cart->sum('price');

        $sale = Sale::create([
            'total_amount' => $totalAmount,
            'user_id' => auth()->user()->id,
        ]);

        $this->cart->each(function ($data, $productId) use ($sale) {
            $sale->products()->attach($productId, [
                'price' => $data['price'],
                'quantity' => $data['quantity'],
            ]);
        });

        $this->dispatch(
            'alert',
            type: 'success',
            message: 'Venda fechada com sucesso!'
        );

        $this->cart = collect([]);
    }
}
