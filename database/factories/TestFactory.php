<?php

namespace Database\Factories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
/**
* The name of the factory's corresponding model.
*
* @var string
*/
protected $model = Test::class;

/**
* Define the model's default state.
*
* @return array
*/

public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'test_code' => $this->faker->unique()->numberBetween(1, 9999),
            'icd_code' => $this->faker->regexify('[A-Z]{1}[0-9]{2}'),
        ];
    }
}
