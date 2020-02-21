<?php

use Illuminate\Database\Seeder;

class FoodTypeTableSeeder extends Seeder
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
                'name' => 'Veg',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
            ],

            [
                'name' => 'Non-Veg',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
            ],

            [
                'name' => 'Eggeterian',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
            ],

            [
                'name' => 'Vegan',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
            ]

        ];

        foreach ($data as $entry) {
            \App\FoodType::create(
                $entry
            );
        }


    }
}
