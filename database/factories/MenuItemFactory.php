<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Drink', 'Meal', 'Dessert'];

        return [
            
            'item_name' => fake()->name(),
            'description' => fake()->word(3),
            'price' => fake()->randomFloat(2, 1, 100000),
            'img_link' => fake()->word(),
            'category' => fake()->randomElement($categories),

        ];
    }
}
