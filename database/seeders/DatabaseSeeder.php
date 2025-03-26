<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,  // Sửa lại từ CartItem::class
            InvoiceSeeder::class,   // Sửa lại từ Invoice::class
            InvoiceItemSeeder::class, // Sửa lại từ InvoiceItem::class
            ReviewSeeder::class,
            PaymentSeeder::class,   // Sửa lại từ Payment::class
            PromotionSeeder::class, // Sửa lại từ Promotion::class
        ]);
    }
}
