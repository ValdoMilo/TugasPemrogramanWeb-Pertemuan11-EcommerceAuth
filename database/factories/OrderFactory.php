<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()?->id ?? Customer::factory(),
            'order_number' => 'ORD-' . strtoupper(fake()->unique()->bothify('??####')),
            'total_price' => fake()->numberBetween(100000, 5000000),
            'status' => fake()->randomElement(['pending', 'paid', 'shipped', 'completed', 'cancelled']),
            'shipping_address' => fake()->address(),
            'ordered_at' => fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }
}