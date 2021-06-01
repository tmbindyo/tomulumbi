<?php

use Carbon\Carbon;
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
            'name' => '100',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '44812619-f3d0-4868-8d11-2117d8943c4a',
            'name' => '300',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '70cb0ba7-7775-421c-99f7-752c6458bc50',
            'name' => '500',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '4afefb3f-8e5c-46fd-9fe4-3fe58362b1aa',
            'name' => '750',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '2757ef7f-57cd-46ab-aa1f-bdb509b378a4',
            'name' => '1000',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('download_resolutions')->insert([
            'id' => 'e1b8718e-4afc-4ffb-9d66-1773e482cad5',
            'name' => '1500',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('download_resolutions')->insert([
            'id' => 'af103812-4992-4357-ab6d-22eaf1479411',
            'name' => '2500',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '73ed39a8-5ff4-4ec0-95c9-7dfbc864f6ca',
            'name' => '3600',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('download_resolutions')->insert([
            'id' => '642052bf-6797-434a-97b8-28cdc3c491af',
            'name' => 'original',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
