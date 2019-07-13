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
                'id' => '6fdf4858-01ce-43ff-bbe6-827f09fa1cef',
                'name' => 'Personal',
                'description' => 'Personal album',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
                'name' => 'Client',
                'description' => 'Client album',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => '6ce90e06-e1c4-4df7-87b6-fe2d4e9ffbc0',
                'name' => 'Backup',
                'description' => 'Backup album',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]
        ];

        foreach ($data as $entry) {
            \App\AlbumType::create(
                $entry
            );
        }
    }
}
