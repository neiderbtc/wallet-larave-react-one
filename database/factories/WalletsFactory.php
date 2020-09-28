<?php

namespace Database\Factories;

use App\Models\Wallets;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wallets::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'money'=> $this->faker->numberBetween($min = 500,$max = 10000)
        ];
    }
}
