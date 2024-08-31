<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Good>
 */
class GoodFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->words(2, true)),
            'short_content' => ucfirst($this->faker->words(14, true)),
            'content' => ucfirst($this->faker->words(50, true)),
            'price' => $this->faker->numberBetween(500, 3000),
            'img' => '',
            'category_id' => Category::query()->inRandomOrder()->value('id'),
        ];
    }
}
