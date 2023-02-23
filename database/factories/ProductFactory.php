<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::all()->pluck('id')->random(1)->first(),
            'name' => fake()->word(),
            'image' => 'default.png',
            'description' => fake()->text(200),
            'count' => random_int(1,100),
            'price' => random_int(1,500),
        ];
    }

}
