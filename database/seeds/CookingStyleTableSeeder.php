<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CookingStyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Boiling',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Broiling',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Deep Frying',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Grilling',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Roasting',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Baking',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Sauteing',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Poaching',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Simmering',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Smoking',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Sous Vide',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Steaming',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Stir Frying',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Braising',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Stewing',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Pressure Cooker',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Slow Cooker',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]

        ];

        foreach ($data as $entry) {
            \App\CookingStyle::create(
                $entry
            );
        }


    }
}
