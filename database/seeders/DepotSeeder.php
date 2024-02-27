<?php

namespace Database\Seeders;

use App\CustomHelpers\CustomHelper;
use App\Models\Depot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $depots = [
            ["name" => "Depot A", "code" => CustomHelper::generateModelCode("DPT-")],
            ["name" => "Depot B", "code" => CustomHelper::generateModelCode("DPT-")],
            ["name" => "Depot C", "code" => CustomHelper::generateModelCode("DPT-")],
        ];

        DB::transaction(function () use ($depots){
            foreach ($depots as $depot){
                Depot::create($depot);
            }
        });
    }
}
