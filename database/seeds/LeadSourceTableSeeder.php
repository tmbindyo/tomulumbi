<?php

use Illuminate\Database\Seeder;

class LeadSourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('lead_sources')->insert([
                'id' => '7c3d68ed-354c-4d66-b881-7725626c03f4',
                'name' => 'Advertisment',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('lead_sources')->insert([
                'id' => '4621ba42-0832-47de-869f-da5775d2bc52',
                'name' => 'Chat',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('lead_sources')->insert([
                'id' => 'e0807ac4-8f8c-40c4-b05c-3ca9171100bb',
                'name' => 'Cold Call',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('lead_sources')->insert([
                'id' => 'c70fd8c4-4f22-4997-ad82-3e77901acf0c',
                'name' => 'Client Referral',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('lead_sources')->insert([
                'id' => 'f3164c3d-96c9-43a3-86da-5757df810100',
                'name' => 'Contact Referral',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('lead_sources')->insert([
                'id' => '42f59dbd-042c-4aee-bb91-8aa8ce962df5',
                'name' => 'Employee Referral',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('lead_sources')->insert([
                'id' => 'f86cdba2-e537-4fcf-92ab-f17f1edabcb7',
                'name' => 'Other',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('lead_sources')->insert([
                'id' => '55197824-2ca1-4ff1-8835-f15762e8bd07',
                'name' => 'Public Relations',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);
            DB::table('lead_sources')->insert([
                'id' => '94201006-ad8b-4841-96a1-5f23e0eeb3d9',
                'name' => 'Website',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            ]);

    }
}
