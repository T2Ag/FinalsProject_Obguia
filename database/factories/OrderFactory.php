<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['Pending', 'InProgress', 'Completed'];

        return [
            'customer_id' => fake()->randomElement(Customer::pluck('id')),
            'status' => fake()->randomElement($statuses),
            'orderdate' => fake()->dateTime(),
        ];
    }
}
