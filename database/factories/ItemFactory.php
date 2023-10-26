<?php

namespace Database\Factories;

use App\Models\Condition;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'desc' => $this->faker->realText(),
            'defects' => $this->faker->realText(),
            'amount' => $this->faker->numberBetween(1, 100000),
            'img' => '/items/sample.jpg'
        ];
    }
}
