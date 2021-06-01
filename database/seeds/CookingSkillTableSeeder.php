<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CookingSkillTableSeeder extends Seeder
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
                'name' => 'Beginner',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Intermediate',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Hard',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]

        ];

        foreach ($data as $entry) {
            \App\CookingSkill::create(
                $entry
            );
        }


    }
}
