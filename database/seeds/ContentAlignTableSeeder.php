<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContentAlignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('content_aligns')->insert([
            'id' => '5e664dd9-8fe4-4f08-82de-80b0f41c592b',
            'name' => 'Right',
            'reference' => 'content-align-right',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('content_aligns')->insert([
            'id' => '54aa3f5c-a52e-4f68-902a-f8c45a51c948',
            'name' => 'Center',
            'reference' => 'content-align-center',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('content_aligns')->insert([
            'id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            'name' => 'Left',
            'reference' => 'content-align-left',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
