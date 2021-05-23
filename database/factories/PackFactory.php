<?php

namespace Database\Factories;

use App\Models\Pack;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pack::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'size' => $this->faker->numberBetween(1, 10000),
            'active' => true,
        ];
    }

    /**
     * Indicate that the user is suspended.
     *
     * @return Factory
     */
    public function inactive(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'active' => false,
            ];
        }
        );
    }
}
