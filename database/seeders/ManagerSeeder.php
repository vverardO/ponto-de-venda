<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    public function run(): void
    {
        User::factory([
            'type' => 'manager',
        ])->count(10)->create();
    }
}
