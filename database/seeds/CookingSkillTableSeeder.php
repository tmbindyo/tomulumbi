<?php

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
            ],

            [
                'name' => 'Intermediate',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
            ],

            [
                'name' => 'Hard',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
            ]

        ];

        foreach ($data as $entry) {
            \App\CookingSkill::create(
                $entry
            );
        }


    }
}
