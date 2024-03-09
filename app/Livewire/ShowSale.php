<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;

class ShowSale extends Component
{
    public Sale $sale;

    public function mount(Sale $sale)
    {
        $sale->load('products');

        $this->sale = $sale;
    }

    public function render()
    {
        $title = "Venda - {$this->sale->id} - {$this->sale->total_amount_formatted}";

        return view('livewire.show-sale')
            ->title($title);
    }
}
