<?php

use Illuminate\Database\Seeder;

class AlbumTypeTableSeeder extends Seeder
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
                'name' => 'User',
                'description' => 'User',
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
