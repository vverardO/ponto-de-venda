<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $phone = str_shuffle('123456789');
        $type = fake()->boolean() ? 'manager' : 'cashier';
        $registrationPhysicalPerson = str_shuffle('12345678901');

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => "55$phone",
            'password' => Hash::make('password'),
            'type' => $type,
            'registration_physical_person' => $registrationPhysicalPerson,
        ];
    }
}
