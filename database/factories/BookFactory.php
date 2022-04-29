<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 20),
            'title' => $this->faker->catchPhrase(),
            'author' => $this->faker->name(),
            'summary' => $this->faker->paragraph(),
            'cover' => $this->faker->image(public_path('images/book_cover'), 400, 300, 'books', false)
        ];
    }
}
