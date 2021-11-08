<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = $this->faker->unique->words(3, true);

        return [
            'title'       => $title,
            'text'        => Str::random(250),
            'cover'       => $this->faker->image,
            'slug'        => Str::slug($title),
            'likes_count' => $this->faker->randomNumber(),
            'views_count' => $this->faker->randomNumber(),
            'updated_at'  => $this->faker->dateTimeThisMonth,
            'created_at'  => $this->faker->dateTimeThisMonth,
        ];
    }
}
