<?php

use Illuminate\Database\Seeder;

class OrganizationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('organization_types')->insert([
                'id' => '7c3d68ed-354c-4d66-b881-7725626c03f4',
                'name' => 'Family',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            ]);

            DB::table('organization_types')->insert([
                'id' => '2efa2729-6438-4397-b06d-ecded822cec3',
                'name' => 'Organization',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            ]);

    }
}
