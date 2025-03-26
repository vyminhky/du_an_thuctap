<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\Book;
use App\Models\CartItem;

class CartItemSeeder extends Seeder
{
    public function run()
    {
        // Đảm bảo có dữ liệu trước khi tạo CartItem
        $carts = Cart::factory()->count(5)->create();
        $books = Book::factory()->count(10)->create();

        foreach ($carts as $cart) {
            CartItem::factory()->count(3)->create([
                'cart_id' => $cart->id,
                'book_id' => $books->random()->id,
            ]);
        }
    }
}
