<?php

use Illuminate\Database\Seeder;

class CoverDesignTableSeeder extends Seeder
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
                'id' => '5e664dd9-8fe4-4f08-82de-80b0f41c592b',
                'name' => 'Center',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => '54aa3f5c-a52e-4f68-902a-f8c45a51c948',
                'name' => 'Frame',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => 'c05a7d97-c81b-40f8-bb8d-c39df0e78e96',
                'name' => 'Split',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => '46e7dcc8-d0bd-46bb-966e-79c700604b7f',
                'name' => 'Left',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => '4d5ce771-f358-4c73-a912-411a7a33163b',
                'name' => 'Label',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => '65a9ff23-0c84-4750-a999-ca57bddc8b01',
                'name' => 'Border',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => '865a82ad-dd96-4ad4-b8c9-6bfd5ae37b67',
                'name' => 'Album',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => 'f5ed5a58-5363-470b-b080-2006993b2a23',
                'name' => 'Classic',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ],
            [
                'id' => '87cdafcc-fa27-46b9-a979-1c674c60cfb6',
                'name' => 'None',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]
        ];

        foreach ($data as $entry) {
            \App\CoverDesign::create(
                $entry
            );
        }
    }
}
