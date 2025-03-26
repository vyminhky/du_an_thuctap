<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Book;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    public function definition()
    {
        return [
            'cart_id' => Cart::inRandomOrder()->first()->id ?? Cart::factory(),
            'book_id' => Book::inRandomOrder()->first()->id ?? Book::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
