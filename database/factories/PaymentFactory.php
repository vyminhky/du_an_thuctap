<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'payment_method' => $this->faker->randomElement(['COD', 'PayPal', 'Stripe']),
            'status' => $this->faker->boolean(70), // 70% đã thanh toán (true), 30% chưa thanh toán (false)
        ];
    }
}
