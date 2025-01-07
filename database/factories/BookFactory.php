<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name,
            'publisher' => $this->faker->company,
            'published_date' => $this->faker->date(),
            'isbn' => $this->faker->isbn13,
            'price' => $this->faker->randomFloat(2, 10000, 500000),
            'stock' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph(3),
            'cover_image' => 'images/default_cover.jpg',
            'status' => $this->faker->randomElement(['active', 'non-active']),
            'category_id' => $this->faker->randomElement($categoryIds),
        ];
    }
}
