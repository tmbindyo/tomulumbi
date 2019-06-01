<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
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
                'name' => 'Admin',
                'description' => 'Admin',
                'status_id' => 6,
            ],
            [
                'name' => 'Project User',
                'description' => 'Project User',
                'status_id' => 6,
            ],
            [
                'name' => 'Investor',
                'description' => 'Investor',
                'status_id' => 6,
            ],
            [
                'name' => 'Project Manager',
                'description' => 'project manager',
                'status_id' => 6,
            ]
        ];

        foreach ($data as $entry) {
            \App\UserType::create(
                $entry
            );
        }
    }
}
