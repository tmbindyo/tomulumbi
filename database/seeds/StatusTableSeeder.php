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
            // Project status
            [
                'id' => 'f6654b11-8f04-4ac9-993f-116a8a6ecaae',
                'name' => 'Ongoing',
                'description' => 'Ongoing',
                'user_id' => 1,
            ],
            [
                'id' => '0fa108dc-22b6-40d9-911b-f692ec90e4a4',
                'name' => 'Preview',
                'description' => 'Preview',
                'user_id' => 1,
            ],
            [
                'id' => 'a6c4c2cc-95ca-4ecf-8ce3-3d08512aad15',
                'name' => 'Completed',
                'description' => 'Completed',
                'user_id' => 1,
            ],
            // Record status
            [
                'id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'name' => 'Active',
                'description' => 'Active record',
                'user_id' => 1,
            ],
            [
                'id' => '402c447e-939f-41b3-bf4b-82a3faecc3db',
                'name' => 'Inactive',
                'description' => 'Inactive record',
                'user_id' => 1,
            ],
            // Image or album status
            [
                'id' => 'cad5abf4-ed94-4184-8f7a-fe5084fb7d56',
                'name' => 'Preview',
                'description' => 'Preview album or image',
                'user_id' => 1,
            ],
            [
                'id' => '389842b7-a010-40c1-85cf-4f5b5144ccea',
                'name' => 'Hidden',
                'description' => 'Hidden album or image',
                'user_id' => 1,
            ],
            [
                'id' => 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5',
                'name' => 'Published',
                'description' => 'Published album or image',
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
