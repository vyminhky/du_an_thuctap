<?php
namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(), // Lấy user ngẫu nhiên hoặc tạo mới
            'status' => fake()->randomElement(['pending', 'processing', 'shipped', 'delivered']),
            'total_price' => fake()->randomFloat(2, 100, 10000), // Giá ngẫu nhiên từ 100 - 10,000
        ];
    }
}
