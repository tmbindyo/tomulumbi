<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('user_types')->insert([
            'id' => '0c31d2c0-8cd9-4c0e-8f67-d313d8e482c6',
            'name' => 'Admin',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('user_types')->insert([
            'id' => '98c9e635-9f29-4add-a51c-f05276d85442',
            'name' => 'User',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('user_types')->insert([
            'id' => 'b7afd524-7dda-4ec6-be04-8677c155f1d0',
            'name' => 'Client',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('user_types')->insert([
            'id' => 'ca279eef-0c48-4ea3-8b1b-4e8c87e2b34d',
            'name' => 'Partner',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

    }
}
