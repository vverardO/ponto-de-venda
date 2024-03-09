<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        $todaySalesQuery = Sale::where('created_at', '>', today());
        $yesterdaySalesQuery = Sale::whereBetween('created_at', [today()->subDay(), today()]);

        $todayTotalSales = $todaySalesQuery->count();
        $todayTotalSalesValue = number_format(($todaySalesQuery->sum('total_amount') / 100), 2, ',', '.');

        $yesterdayTotalSales = $yesterdaySalesQuery->count();
        $yesterdayTotalSalesValue = number_format(($yesterdaySalesQuery->sum('total_amount') / 100), 2, ',', '.');

        $todayPercentageByQuantity = ($todayTotalSales / ($yesterdayTotalSales ?: 1)) * 100;
        $todayPercentageByValue = number_format(($todaySalesQuery->sum('total_amount') / ($yesterdaySalesQuery->sum('total_amount') ?: 1)) / 100, 2);

        return view('livewire.dashboard', compact([
            'todayTotalSales',
            'todayTotalSalesValue',
            'yesterdayTotalSales',
            'yesterdayTotalSalesValue',
            'todayPercentageByQuantity',
            'todayPercentageByValue',
        ]));
    }
}
