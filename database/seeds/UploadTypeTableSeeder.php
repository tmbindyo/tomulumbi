<?php

use Illuminate\Database\Seeder;

class UploadTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('album_types')->insert([
                'id' => '6fdf4858-01ce-43ff-bbe6-827f09fa1cef',
                'name' => 'Client Proof Cover Image',
                'description' => 'Personal album',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('album_types')->insert([
                'id' => '6fdf4858-01ce-43ff-bbe6-827f09fa1cef',
                'name' => 'Client Proof Album Set Image',
                'description' => 'Client Proof Album Set Image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('album_types')->insert([
                'id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
                'name' => 'Personal Album Cover Image',
                'description' => 'Personal album cover image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('album_types')->insert([
                'id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
                'name' => 'Personal Album Image',
                'description' => 'Personal album image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('album_types')->insert([
                'id' => '6ce90e06-e1c4-4df7-87b6-fe2d4e9ffbc0',
                'name' => 'Design Cover Image',
                'description' => 'Design cover image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('album_types')->insert([
                'id' => '6ce90e06-e1c4-4df7-87b6-fe2d4e9ffbc0',
                'name' => 'Design Work Image',
                'description' => 'Design work image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('album_types')->insert([
                'id' => '6ce90e06-e1c4-4df7-87b6-fe2d4e9ffbc0',
                'name' => 'Design Gallery Image',
                'description' => 'Design gallery image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('album_types')->insert([
                'id' => '6ce90e06-e1c4-4df7-87b6-fe2d4e9ffbc0',
                'name' => 'DIY',
                'description' => 'Random DIY items made',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);

    }
}
