<?php

use Illuminate\Database\Seeder;

class SchemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('schemes')->insert([
            'id' => '5e664dd9-8fe4-4f08-82de-80b0f41c592b',
            'name' => 'Normal',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('schemes')->insert([
            'id' => '54aa3f5c-a52e-4f68-902a-f8c45a51c948',
            'name' => 'Invert',
            'reference' => 'invert',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

    }
}
