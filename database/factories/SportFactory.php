<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

class SportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prices = Price::pluck('id')->toArray();
        $category = Category::pluck('id')->toArray();
        return [
            'uuid'=> random_int(1,20),
            'name'=> $this->faker->name(),
            'image_path' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
            'describe' => $this->faker->text(20),
            'price_id' => $this->faker->randomElement($prices),
            'category_id'  => $this->faker->randomElement($category),
        ];
    }
}
