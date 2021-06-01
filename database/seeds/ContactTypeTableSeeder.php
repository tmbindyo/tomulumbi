<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContactTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('contact_types')->insert([
                'id' => '6fdf4858-01ce-43ff-bbe6-827f09fa1cef',
                'name' => 'Client',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('contact_types')->insert([
                'id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
                'name' => 'Partner',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('contact_types')->insert([
                'id' => 'a5ac460c-9a97-4b89-99f4-3592c0a9387f',
                'name' => 'Supplier',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

    }
}
