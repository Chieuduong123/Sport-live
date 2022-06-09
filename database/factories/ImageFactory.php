<?php

namespace Database\Factories;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sports = Sport::pluck('id')->toArray();
        return [
            'sport_id' => $this->faker->randomElement($sports),
            'image_path' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
            'title' => $this->faker->text(20),
           
        ];
    }
}
