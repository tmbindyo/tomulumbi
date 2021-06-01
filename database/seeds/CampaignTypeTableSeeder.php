<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CampaignTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('campaign_types')->insert([
                'id' => '7c3d68ed-354c-4d66-b881-7725626c03f4',
                'name' => 'Sell',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => 'e606ef5a-2116-44c4-84aa-18e3b45e3cfe',
                'name' => 'Social Media',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => '2efa2729-6438-4397-b06d-ecded822cec3',
                'name' => 'Conference',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => 'c31c3b47-4353-4916-bfc1-d38e54c49024',
                'name' => 'Webniar',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Trade Show',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => '23c139e8-4c04-423f-9e9b-04e8921f61c1',
                'name' => 'Public Relations',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => '383ff37f-9fee-42ad-981f-baacc3a41338',
                'name' => 'Partners',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => '89135570-7baa-4ae8-bce5-1df1a06d589e',
                'name' => 'Referral Program',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => '186ce466-b837-4975-a8ef-f1117720cb40',
                'name' => 'Advertisment',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => '2e81a235-0421-4008-b0aa-4ceaf4e0d2b9',
                'name' => 'Banner Ad',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => '895fdf34-adca-482e-a20b-87d73139e0ca',
                'name' => 'Email',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => 'b7e7b954-8b66-4b0e-9c85-e7045faa2c49',
                'name' => 'Telemarketing',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('campaign_types')->insert([
                'id' => 'd2f9c962-2af0-4566-bd54-d92fdafa8a3b',
                'name' => 'Other',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

    }
}
