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
        $image = ['aaa.png', 'rrrr.jpg', 'eeee.png', 'qqqq.png'];
        $sports = Sport::pluck('id')->toArray();
        return [
            'sport_id' => $this->faker->randomElement($sports),
            'image_path' => array_rand(array_flip($image)),
            'title' => $this->faker->text(20),
           
        ];
    }
}
