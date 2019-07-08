<?php

use Illuminate\Database\Seeder;

class DownloadResolutionTableSeeder extends Seeder
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
                'name' => 'Original',
                'description' => 'Personal album',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'name' => 'High Resolution',
                'description' => '3600',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'name' => 'QHD',
                'description' => '2048',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'name' => 'HD',
                'description' => '1024',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'name' => 'nHD',
                'description' => '640',
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