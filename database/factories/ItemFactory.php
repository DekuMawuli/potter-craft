<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Document;
use App\Models\Item;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'document_id' => Document::factory(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'short_description' => $this->faker->text(),
            'status' => $this->faker->randomElement(["available",""]),
        ];
    }
}
