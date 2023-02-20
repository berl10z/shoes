<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Кроссовки', 'slug' => 'sneakers'],
            ['name' => 'Башмаки', 'slug' => 'shoes'],
            ['name' => 'Сандали', 'slug' => 'sandals'],
        ];
        Category::insert($categories);
    }
}
