<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Depot;
use App\Models\Document;
use App\Models\SyncEndpoint;
use App\Models\SyncLog;
use App\Models\User;

class SyncLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SyncLog::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'depot_id' => Depot::factory(),
            'document_id' => Document::factory(),
            'sync_endpoint_id' => SyncEndpoint::factory(),
            'user_id' => User::factory(),
            'status' => $this->faker->word(),
            'message' => $this->faker->text(),
        ];
    }
}
