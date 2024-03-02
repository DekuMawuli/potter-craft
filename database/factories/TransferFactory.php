<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Depot;
use App\Models\Document;
use App\Models\Item;
use App\Models\Transfer;
use App\Models\User;

class TransferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transfer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'sender_depot_id' => Depot::factory(),
            'recipient_depot_id' => Depot::factory(),
            'document_id' => Document::factory(),
            'sender_id' => User::factory(),
            'item_id' => Item::factory(),
        ];
    }
}
