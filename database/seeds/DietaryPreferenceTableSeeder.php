<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DietaryPreferenceTableSeeder extends Seeder
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
                'name' => 'Nut Free',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Low Carb',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'High Protein',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Weight Gain',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Weight Loss',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Pregnancy',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Low Calorie',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Low Fat',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Low Potassium',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Gluten Free',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'High Fibre',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Zero Oil',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Diabetic',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Keto',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Low Sodium',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Soy Free',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Healthy',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Low Cholestrol',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Dairy Free',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Seafood',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Egg Free',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]

        ];

        foreach ($data as $entry) {
            \App\DietaryPreference::create(
                $entry
            );
        }


    }
}
