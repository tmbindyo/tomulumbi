<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // todo creating seeder for product type

            DB::table('types')->insert([
                'id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
                'name' => 'Tees',
                'description' => "Tee's",
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);

            DB::table('types')->insert([
                'id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
                'name' => 'Print',
                'description' => 'Print',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);

    }
}
