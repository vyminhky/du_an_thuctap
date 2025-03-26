<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        Invoice::factory(20)->create(); // Tạo 20 hóa đơn giả
    }
}
