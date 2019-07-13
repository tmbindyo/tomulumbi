<?php

use Illuminate\Database\Seeder;

class ProjectTypeTableSeeder extends Seeder
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
                'id' => 'f7da0ff4-d9fb-4ea7-b0b7-bd94ecc54041',
                'name' => 'Personal',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => 'f5674e18-8d64-4e04-b55a-6bc9b196eec5',
                'name' => 'Client',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]
        ];

        foreach ($data as $entry) {
            \App\ProjectType::create(
                $entry
            );
        }
    }
}
