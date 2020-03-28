<?php

use Illuminate\Database\Seeder;

class TudemeTopLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('tudeme_top_locations')->insert([
            'id' => '708bd75d-1a25-441e-b165-6c5400627e37',
            'location' => 'Top Left',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('tudeme_top_locations')->insert([
            'id' => '29a58b4d-4d9e-4f33-9982-ef4139b11902',
            'location' => 'Bottom Left',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('tudeme_top_locations')->insert([
            'id' => 'eb7ba288-5774-4fa1-b31f-b0acfda6f37f',
            'location' => 'Center',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('tudeme_top_locations')->insert([
            'id' => '379564a7-907c-4cb9-9e75-b1117961f320',
            'location' => 'Top Right',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('tudeme_top_locations')->insert([
            'id' => 'be7118e3-80f2-40ca-b237-f8f1f795f413',
            'location' => 'Bottom Right',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);




    }
}
