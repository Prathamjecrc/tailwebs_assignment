<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->name(), 
            'subject' => $this->faker->randomElement(['Math', 'Science', 'History', 'Geography', 'Literature']),
            'marks' => $this->faker->numberBetween(0,100),
            //
        ];
    }
}
