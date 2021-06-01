<?php

use Illuminate\Database\Seeder;

class IngredientTableSeeder extends Seeder
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
                'name' => 'butter',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'white sugar',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'brown sugar',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'egg',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'vanilla extract',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'all purpose flour',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'baking soda',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'salt',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'sour cream',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'wallnuts',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'banana',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];

        foreach ($data as $entry) {
            \App\Ingredient::create(
                $entry
            );
        }


    }
}
