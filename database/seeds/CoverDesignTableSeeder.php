<?php

use Illuminate\Database\Seeder;

class CoverDesignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cover_designs')->insert([
            'id' => '5e664dd9-8fe4-4f08-82de-80b0f41c592b',
            'name' => 'Split',
            'reference' => 'style1',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('cover_designs')->insert([
            'id' => '54aa3f5c-a52e-4f68-902a-f8c45a51c948',
            'name' => 'Frame',
            'reference' => 'style2',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('cover_designs')->insert([
            'id' => 'c05a7d97-c81b-40f8-bb8d-c39df0e78e96',
            'name' => 'Spotlight',
            'reference' => 'style3',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('cover_designs')->insert([
            'id' => '46e7dcc8-d0bd-46bb-966e-79c700604b7f',
            'name' => 'Phone',
            'reference' => 'style4',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('cover_designs')->insert([
            'id' => '4d5ce771-f358-4c73-a912-411a7a33163b',
            'name' => 'Center',
            'reference' => 'style5',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

    }
}
