<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jewellery>
 */
class JewelleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words($nb = 3, $asText = true),
            'img' => "necklace1",
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
            'description' => fake()->paragraph($nbSentences = 3, $variableNbSentences = true),
            'category' => fake()->randomElement(["earrings", "ring", "necklace", "bracelets"]),
            'material' => fake()->randomElement(["sterling silver", "gold", "rosegold", "white gold", "bronze"]),
            'order_id' => "1"
        ];
    }
}
