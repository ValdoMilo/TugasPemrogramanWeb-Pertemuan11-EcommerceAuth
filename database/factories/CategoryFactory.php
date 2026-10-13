<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Elektronik', 'Pakaian', 'Makanan', 'Minuman', 'Perabot',
            'Olahraga', 'Kecantikan', 'Mainan', 'Buku', 'Otomotif',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentence(10),
        ];
    }
}