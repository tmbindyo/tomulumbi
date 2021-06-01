<?php

use Illuminate\Database\Seeder;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('titles')->insert([
                'id' => '7c3d68ed-354c-4d66-b881-7725626c03f4',
                'name' => 'Mr',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('titles')->insert([
                'id' => '4621ba42-0832-47de-869f-da5775d2bc52',
                'name' => 'Mrs',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('titles')->insert([
                'id' => 'e0807ac4-8f8c-40c4-b05c-3ca9171100bb',
                'name' => 'Ms',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('titles')->insert([
                'id' => 'c70fd8c4-4f22-4997-ad82-3e77901acf0c',
                'name' => 'Dr',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('titles')->insert([
                'id' => 'f3164c3d-96c9-43a3-86da-5757df810100',
                'name' => 'Prof',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
    }
}
