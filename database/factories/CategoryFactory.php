<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
        ];
    }

    public function suspended()
    {
        return $this->state(function (array $attributes) {
            return [
                'description' => 'suspended',
            ];
        });
    }
}
