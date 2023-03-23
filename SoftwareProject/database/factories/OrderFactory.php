<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date_ordered' => fake()->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'address' => fake()->streetAddress(),
            'total_price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
            'user_id'=> '1',
        ];
    }
}
