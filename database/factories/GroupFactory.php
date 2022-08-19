<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //Педагогов создовать с использованием state(['name'=>"Педагоги"])
            'name' => $this->faker->randomElement(['21-K','22-V','42-G','32-H','31-D'])
        ];
    }
}
