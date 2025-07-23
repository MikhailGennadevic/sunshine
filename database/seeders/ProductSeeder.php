<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['smartphones', 'laptops', 'headphones', 'tv', 'photo', 'accessories'];
    
        \App\Models\Product::factory()
            ->count(20) // создаст 20 случайных продуктов
            ->create([
                'category' => function() use ($categories) {
                    return $categories[array_rand($categories)];
                }
        ]);
    }
}
