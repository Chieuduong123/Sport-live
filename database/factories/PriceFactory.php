<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Price;


class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */

    protected $model = Price::class;
  
    
    public function definition()
    {
        return [
            'price'=> $this->faker->randomFloat(2, 1, 100 ),
            'memo'=> $this->faker->text(200),
        ];
    }
}
