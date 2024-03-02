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
            [
                "name" => "Depot A", "code" => CustomHelper::generateModelCode("DPT-"),
                "location" => "abrepo-junction", "region" => "ASHANTI", "description" => "Dealers in ceramic tiles",
                "status" => "active"
            ],
            [
                "name" => "Depot B", "code" => CustomHelper::generateModelCode("DPT-"),
                "location" => "Navrongo", "region" => "UPPER EAST", "description" => "Dealers in Italian Tiles",
                "status" => "active"
            ],
            [
                "name" => "Depot C", "code" => CustomHelper::generateModelCode("DPT-"),
                "location" => "Osu", "region" => "GREATER ACCRA", "description" => "Dealers in Romanian Tiles and plasters",
                "status" => "inactive"
            ],
        ];

        DB::transaction(function () use ($depots){
            foreach ($depots as $depot){
                Depot::create($depot);
            }
        });
    }
}
