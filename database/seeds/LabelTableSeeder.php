<?php

use Illuminate\Database\Seeder;

class LabelTableSeeder extends Seeder
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
                'name' => 'Story',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'is_tudeme' => 0,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Rambling',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'is_tudeme' => 0,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Cooking Technique',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'is_tudeme' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];

        foreach ($data as $entry) {
            \App\Label::create(
                $entry
            );
        }


    }
}
