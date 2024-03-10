<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Vendas')]
class Sales extends Component
{
    public function render()
    {
        $sales = Sale::orderByDesc('id')->get();

        return view('livewire.sales')
            ->with('sales', $sales);
    }
}
