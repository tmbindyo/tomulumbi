<?php

use Illuminate\Database\Seeder;

class MeasurmentTableSeeder extends Seeder
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
                'name' => 'cup',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'teaspoon',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'tablespoon',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];

        foreach ($data as $entry) {
            \App\Measurment::create(
                $entry
            );
        }


    }
}
