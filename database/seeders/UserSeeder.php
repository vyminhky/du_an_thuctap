<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tạo 10 user ngẫu nhiên
        User::factory(10)->create();

        // Tạo 1 admin cụ thể
        
    }
}
