<?php

namespace Database\Factories;

use App\Models\Transfers;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransfersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transfers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'=> $this->faker->text($maxCharts = 200),
            'amount'=> $this->faker->numberBetween($min = 200,$max = 1000),
            'wallet_id'=>$this->faker->randomDigitNotNull,
        ];
    }
}
