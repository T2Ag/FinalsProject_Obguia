<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

    $menuItemID = fake()->randomElement(MenuItem::pluck('id'));
    $menuItem = MenuItem::find($menuItemID);
    $quantity = fake()->numberBetween(1, 100);
    $totalPrice = $menuItem->price * $quantity;

        return [
            'order_id' => fake()->randomElement(Order::pluck('id')),
            'menuitem_id' => fake()->randomElement(MenuItem::pluck('id')),
            'quantity' => fake()->numberBetween(1, 100),
            'totalprice' => fake()->randomFloat(2, 1, 100000),
        ];
    }
}
