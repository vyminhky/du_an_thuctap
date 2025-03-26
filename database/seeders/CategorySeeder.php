<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()->count(10)->create(); // ✅ Tạo 10 danh mục giả
    }
}
