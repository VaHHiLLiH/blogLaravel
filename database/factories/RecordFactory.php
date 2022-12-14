<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();

        return [
            'name'          => $name,
            'slug'          => Str::slug($name),
            'description'   => $this->faker->text(4600),
            'image'         => $this->faker->imageUrl(width: 200, height: 200),
            'author_id'     => null,
            'like'          => 0,
            'looked'        => 0,
        ];
    }
}
