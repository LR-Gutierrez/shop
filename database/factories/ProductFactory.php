<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**

    * The name of the factory's corresponding model.

    *

    * @var string

    */

    protected $model = Product::class;

    /**

    * Define the model's default state.

    *

    * @return array

    */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2),
            'tax' => $this->faker->numberBetween(0, 15),
            'status' => '1',
            'registered_by' => '1', // user id
        ];
    }
}
