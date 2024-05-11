<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryNumber>
 */
class CategoryNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category_ids = Category::pluck('id')->toArray();
        return [
            'category_id' => $this->faker->unique()->randomElement($category_ids),
            'category_number' => fake()->unique()->numberBetween($min = 1, $max = 10000),
        ];
    }
}
