<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Depot;
use App\Models\Document;
use App\Models\User;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'depot_id' => Depot::factory(),
            'user_id' => User::factory(),
            'filename' => $this->faker->word(),
            'status' => $this->faker->randomElement(["error","success","pending"]),
        ];
    }
}