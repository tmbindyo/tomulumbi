<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // clothing based
        DB::table('sizes')->insert([
            'id' => '55c11926-db71-4501-a534-e89131f758dd',
            'size' => 'S',
            'user_id' => 1,
            'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('sizes')->insert([
            'id' => '8d1cb3d3-0aba-488c-a711-f2eb9899a56a',
            'size' => 'M',
            'user_id' => 1,
            'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('sizes')->insert([
            'id' => 'f09ed53f-0be3-4167-85b9-64ea6e89824e',
            'size' => 'L',
            'user_id' => 1,
            'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('sizes')->insert([
            'id' => '4fe0f07e-eea5-4c96-b912-4deed12976a7',
            'size' => 'XL',
            'user_id' => 1,
            'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('sizes')->insert([
            'id' => '9f79a8f1-4a6f-45c6-a1e9-853cfcd8ac6c',
            'size' => 'XXL',
            'user_id' => 1,
            'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('sizes')->insert([
            'id' => '4e93c226-eee2-48d5-b10a-87e4b8218f23',
            'size' => 'XXXL',
            'user_id' => 1,
            'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        // print based
        DB::table('sizes')->insert([
            'id' => 'cceb3195-3d41-40d8-9f68-c43099af6cae',
            'size' => '4*6',
            'user_id' => 1,
            'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('sizes')->insert([
            'id' => '6b6f2674-1aad-4626-91f9-0329d1ce8eb4',
            'size' => '10*12',
            'user_id' => 1,
            'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('sizes')->insert([
            'id' => '948f1eac-ab33-4a98-b299-86643b313887',
            'size' => '12*18',
            'user_id' => 1,
            'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

        DB::table('sizes')->insert([
            'id' => '05813eb4-4647-4def-a584-6408bd9061ee',
            'size' => '20*30',
            'user_id' => 1,
            'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);


    }
}
