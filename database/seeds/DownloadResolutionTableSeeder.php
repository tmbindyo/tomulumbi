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

        DB::table('download_resolutions')->insert([
            'id' => 'f354c3f8-e69b-4cec-a523-949577eddb94',
            'name' => 'Original',
            'description' => 'Personal album',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '44812619-f3d0-4868-8d11-2117d8943c4a',
            'name' => 'High Resolution',
            'description' => '3600',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '70cb0ba7-7775-421c-99f7-752c6458bc50',
            'name' => 'QHD',
            'description' => '2048',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '4afefb3f-8e5c-46fd-9fe4-3fe58362b1aa',
            'name' => 'HD',
            'description' => '1024',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '2757ef7f-57cd-46ab-aa1f-bdb509b378a4',
            'name' => 'nHD',
            'description' => '640',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

    }
}
