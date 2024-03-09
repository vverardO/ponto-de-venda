<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => rand(1, 9999),
            'image' => '/images/products/produto-'.rand(1, 9).'.png',
        ];
    }
}
