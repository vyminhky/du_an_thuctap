<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceItem;

class InvoiceItemSeeder extends Seeder
{
    public function run(): void
    {
        InvoiceItem::factory(50)->create(); // Tạo 50 mục hóa đơn giả
    }
}
