<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Promotion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), // Tên khuyến mãi ngẫu nhiên
            'discount' => $this->faker->randomFloat(2, 5, 50), // Giảm giá từ 5% đến 50%
            'start_date' => $this->faker->dateTimeBetween('-1 months', 'now'), // Bắt đầu trong 1 tháng trở lại đây
            'end_date' => $this->faker->dateTimeBetween('now', '+2 months'), // Kết thúc trong 2 tháng tới
        ];
    }
}
