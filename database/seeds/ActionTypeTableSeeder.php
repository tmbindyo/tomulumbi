<?php

use Illuminate\Database\Seeder;

class ActionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('action_types')->insert([
                'id' => '7c3d68ed-354c-4d66-b881-7725626c03f4',
                'name' => 'Sell',
                'description' => 'Selling of gear',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);

            DB::table('action_types')->insert([
                'id' => '2efa2729-6438-4397-b06d-ecded822cec3',
                'name' => 'Rent',
                'description' => 'Renting of gear',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);

            DB::table('action_types')->insert([
                'id' => 'c31c3b47-4353-4916-bfc1-d38e54c49024',
                'name' => 'Give Out',
                'description' => 'Giving out of gear',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);

            DB::table('action_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Maintainance',
                'description' => 'Maintainance of gear',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);

    }
}
