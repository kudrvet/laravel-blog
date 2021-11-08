<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $domain = env('APP_URL', 'http://test.com');
        $fakeTag = $this->faker->word;
        return [
            'label' => $fakeTag,
            'url'   => "{$domain}/tags/$fakeTag",
        ];
    }
}
