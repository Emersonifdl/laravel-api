<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    public function definition()
    {
        return [
            'address'   => $this->faker->freeEmail(),
            'type'      => 'Work',
            'person_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
