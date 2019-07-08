<?php

use Illuminate\Database\Seeder;

class ThumbnailSizeTableSeeder extends Seeder
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
                'name' => 'Regular',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
                'name' => 'Large',
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
