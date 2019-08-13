<?php

use Illuminate\Database\Seeder;

class StatusTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_types')->insert([
            'id' => 'e6dc4713-612f-455e-a30c-3e29ebdddf70',
            'name' => 'Project status type',
            'description' => 'Project status type',
            'user_id' => 1,
        ]);
        DB::table('status_types')->insert([
            'id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'name' => 'Record status type',
            'description' => 'Record status type',
            'user_id' => 1,
        ]);
        DB::table('status_types')->insert([
            'id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'name' => 'Image/Album status type',
            'description' => 'Image/Album status type',
            'user_id' => 1,
        ]);
        DB::table('status_types')->insert([
            'id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'name' => 'To do status type',
            'description' => 'To do status type',
            'user_id' => 1,
        ]);
    }
}
