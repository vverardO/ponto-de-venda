<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CashierSeeder extends Seeder
{
    public function run(): void
    {
        User::factory([
            'type' => 'cashier',
        ])->count(10)->create();
    }
}
