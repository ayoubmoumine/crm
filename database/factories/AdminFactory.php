<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$JbOmVRCOVO20Eh1ifZhhFO9LHdml49.pRSyyN8Vw6hdr43gO6G84C', //password
            'remember_token' => Str::random(10),
        ];
    }
}
