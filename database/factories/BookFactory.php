<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
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
        return [
            'title'=> $this->faker->title,
            'author_id'=> Author::all()->random()->id,
            'publisher_id'=> Publisher::all()->random()->id,
            'year_published'=> $this->faker->year,
            'description'=> $this->faker->sentence,
            'category_id'=> Category::all()->random()->id,
            'price'=> $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
