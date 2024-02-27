<?php

namespace Database\Seeders;

use App\CustomHelpers\CustomHelper;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "Kofivi Mawuli", "email" => "kofivi@admin.com",
                "role" => "admin", "password" => Hash::make("0244123321"),
                "phone" => "0244888777", "code" => CustomHelper::generateModelCode("USSR")
            ],
            [
                "name" => "Bernard Deport", "email" => "ben@regular.com", "depot_id" => 1,
                "role" => "user", "password" => Hash::make("0244111222"),
                "phone" => "0244123123", "code" => CustomHelper::generateModelCode("USSR")
            ],
        ];

        DB::transaction(function () use ($users){
            foreach ($users as $user){
                User::create($user);
            }
        });

    }
}
