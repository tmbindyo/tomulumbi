<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('colors')->insert([
            'id' => '8a9f42f3-e96d-4d66-b79a-7227e4442e63',
            'name' => 'None',
            'reference' => '',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('colors')->insert([
            'id' => 'cb14e177-d992-4151-8200-6d2c9992f581',
            'name' => 'Outer Space',
            'reference' => 'color1',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('colors')->insert([
            'id' => '10b76111-16e5-4da7-bb71-e9366fe7dffb',
            'name' => 'Petite Orchid',
            'reference' => 'color2',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('colors')->insert([
            'id' => 'a2a221cd-c10b-4adb-bf5d-3c48a19b8e36',
            'name' => 'Lavender Purple Light',
            'reference' => 'color3',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('colors')->insert([
            'id' => 'f4301821-c297-4367-9fc2-664038ffad65',
            'name' => 'Lavender Purple Dark',
            'reference' => 'color4',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('colors')->insert([
            'id' => '4e7bb668-7acb-4e97-a63d-73bf7146a72e',
            'name' => 'Danube',
            'reference' => 'color5',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('colors')->insert([
            'id' => '7d4aa359-2c23-42e5-be7c-d179a9bfb710',
            'name' => 'Tradewind',
            'reference' => 'color6',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('colors')->insert([
            'id' => '6fdf4858-01ce-43ff-bbe6-827f09fa1cef',
            'name' => 'Patina',
            'reference' => 'color7',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



    }
}
