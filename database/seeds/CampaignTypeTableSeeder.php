<?php

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
                'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '2efa2729-6438-4397-b06d-ecded822cec3',
                'name' => 'Conference',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            ]);

            DB::table('campaign_types')->insert([
                'id' => 'c31c3b47-4353-4916-bfc1-d38e54c49024',
                'name' => 'Webniar',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Trade Show',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Public Relations',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Partners',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Referral Program',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Advertisment',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Banner Ad',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Email',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Telemarketing',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('campaign_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Other',
                'user_id' => 1,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

    }
}