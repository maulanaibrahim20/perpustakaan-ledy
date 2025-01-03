<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'user@gmail.com',
            'role' => 'user',
        ]);

        User::factory()->create([
            'email' => 'admin@gmail.com',
            'role' => 'admin',
        ]);

        Category::factory()->count(10)->create();
        book::factory()->count(10)->create();
    }
}
