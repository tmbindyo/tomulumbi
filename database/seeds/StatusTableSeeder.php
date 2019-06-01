<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
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
                'name' => 'Pending',
                'description' => 'Pending',
                'user_id' => 1,
            ],
            [
                'name' => 'Approved',
                'description' => 'Approved',
                'user_id' => 1,
            ],
            [
                'name' => 'Open',
                'description' => 'Open',
                'user_id' => 1,
            ],
            [
                'name' => 'Completed',
                'description' => 'Completed',
                'user_id' => 1,
            ],
            [
                'name' => 'Ongoing',
                'description' => 'Ongoing',
                'user_id' => 1,
            ],
            [
                'name' => 'Active',
                'description' => 'Active',
                'user_id' => 1,
            ],
            [
                'name' => 'Inactive',
                'description' => 'Inactive',
                'user_id' => 1,
            ]
        ];

        foreach ($data as $entry) {
            \App\Status::create(
                $entry
            );
        }
    }
}
