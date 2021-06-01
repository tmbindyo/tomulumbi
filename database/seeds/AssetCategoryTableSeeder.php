<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AssetCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('asset_categories')->insert([
                'id' => '7c3d68ed-354c-4d66-b881-7725626c03f4',
                'name' => 'Camera',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('asset_categories')->insert([
                'id' => '2efa2729-6438-4397-b06d-ecded822cec3',
                'name' => 'Lens',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('asset_categories')->insert([
                'id' => 'c31c3b47-4353-4916-bfc1-d38e54c49024',
                'name' => 'Gadget',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('asset_categories')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Computer',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('asset_categories')->insert([
                'id' => 'cd5a48e8-4483-4dde-a178-dc90b0b59d25',
                'name' => 'Data Storage',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('asset_categories')->insert([
                'id' => '40158f7d-ce88-4c72-a278-db5250943e23',
                'name' => 'Lighting/Flash',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('asset_categories')->insert([
                'id' => 'c572fddf-dcdd-44d2-8326-00a37e0a7f62',
                'name' => 'Bags and Cases',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('asset_categories')->insert([
                'id' => 'f15fd72b-decd-4d15-a49b-7b259e45cfb5',
                'name' => 'Tripods and Supports',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('asset_categories')->insert([
                'id' => '6ca1e485-feb8-4d89-b2f3-45304880122a',
                'name' => 'Acessories',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('asset_categories')->insert([
                'id' => 'd1e3a2a4-bcad-4f77-98fd-017c42790487',
                'name' => 'Audio',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

    }
}
