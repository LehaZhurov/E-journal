<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'value' => $this->faker->randomElement([5, 4, 3, 2]),
            'num_day' => $this->faker->randomElement(['01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31']),
            'num_month' => $this->faker->randomElement(['01','02','03','04','05','06','07','08','09','10','11','12']),
            'year' => $this->faker->randomElement(['2022','2023','2024','2025','2026','2027','2028'])
        ];
    }
}
