<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Book;

class CartSeeder extends Seeder
{
    public function run()
    {
        // Tắt kiểm tra khóa ngoại để tránh lỗi khi xóa dữ liệu
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Xóa toàn bộ dữ liệu cũ
        CartItem::truncate();
        Cart::truncate();

        // Bật lại kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Tạo 10 giỏ hàng
        $carts = Cart::factory()->count(10)->create();

        // Mỗi giỏ hàng có từ 1-5 sản phẩm
        $carts->each(function ($cart) {
            // Lấy danh sách ID của sách có sẵn
            $bookIds = Book::pluck('id')->toArray();

            // Nếu không có sách trong database, bỏ qua bước này
            if (empty($bookIds)) {
                return;
            }

            // Tạo sản phẩm giỏ hàng
            CartItem::factory()
                ->count(rand(1, 5))
                ->create([
                    'cart_id' => $cart->id,
                    'book_id' => $bookIds[array_rand($bookIds)], // Chọn ngẫu nhiên một sách có sẵn
                ]);
        });
    }
}
