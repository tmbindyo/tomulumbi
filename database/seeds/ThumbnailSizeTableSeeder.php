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

        DB::table('thumbnail_sizes')->insert([
            'id' => '6fdf4858-01ce-43ff-bbe6-827f09fa1cef',
            'name' => 'Regular',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('thumbnail_sizes')->insert([
            'id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            'name' => 'Large',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

    }
}
