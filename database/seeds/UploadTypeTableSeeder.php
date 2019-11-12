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

            DB::table('upload_types')->insert([
                'id' => '11bde94f-e686-488e-9051-bc52f37df8cf',
                'name' => 'Client Proof Cover Image',
                'description' => 'Personal album',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('upload_types')->insert([
                'id' => 'b3399a38-b355-4235-8f93-36baf410eef2',
                'name' => 'Client Proof Album Set Image',
                'description' => 'Client Proof Album Set Image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('upload_types')->insert([
                'id' => 'ccdd1cb1-571d-46b9-b683-ac30b4319c2a',
                'name' => 'Personal Album Cover Image',
                'description' => 'Personal album cover image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('upload_types')->insert([
                'id' => '8e060242-130e-4382-906d-6d8da148fb28',
                'name' => 'Personal Album Image',
                'description' => 'Personal album image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('upload_types')->insert([
                'id' => '647b9ff2-9c56-4e2e-a4c8-e2438e1dc711',
                'name' => 'Design Cover Image',
                'description' => 'Design cover image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('upload_types')->insert([
                'id' => 'b64c0d17-2e06-4b1e-83ed-55cd606ff4fe',
                'name' => 'Design Work Image',
                'description' => 'Design work image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('upload_types')->insert([
                'id' => '720a967d-16b1-46c4-b22d-9e734e94c9e9',
                'name' => 'Design Gallery Image',
                'description' => 'Design gallery image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('upload_types')->insert([
                'id' => '1ff623fb-c86a-4e20-8ccc-b80dceed469e',
                'name' => 'DIY',
                'description' => 'Random DIY items made',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('upload_types')->insert([
                'id' => 'b2877336-2866-47f6-9b44-094b4d414d1b',
                'name' => 'Tag Cover Image',
                'description' => 'Tag Cover Image',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);

    }
}
