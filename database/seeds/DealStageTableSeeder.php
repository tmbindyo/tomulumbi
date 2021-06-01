<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DealStageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()    {



        DB::table('deal_stages')->insert([
            'id' => 'ee1e792a-db44-4a11-859e-f6cd08b370e3',
            'name' => 'Qualification',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('deal_stages')->insert([
            'id' => 'cae524a1-6738-4873-923a-f599fb93f4af',
            'name' => 'Needs Analysis',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('deal_stages')->insert([
            'id' => 'e2bc3dbd-b04e-4430-945a-0e1e08f56ed1',
            'name' => 'Value Proposition',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('deal_stages')->insert([
            'id' => '881514cf-fc5e-448b-9dbc-94a997246367',
            'name' => 'Decision Makers',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('deal_stages')->insert([
            'id' => 'a36cc2ea-0237-43b1-83d3-870421bbff87',
            'name' => 'Proposal/Price Quote',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('deal_stages')->insert([
            'id' => '7c867d58-b5fe-4b77-90a2-83bda0aa410d',
            'name' => 'Negotiation Review',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('deal_stages')->insert([
            'id' => '1ec4bb41-6006-4ae3-893f-1457d0652442',
            'name' => 'Closed Won',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('deal_stages')->insert([
            'id' => '526e42a1-a1b6-4b50-8e8d-4a4dcdb2882c',
            'name' => 'Closed Lost',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('deal_stages')->insert([
            'id' => 'f5bab0e8-0246-4d05-b390-7b7f642d1317',
            'name' => 'Closed Lost to competition',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('deal_stages')->insert([
            'id' => 'e7b44926-8e39-4784-90f1-36cd87c16e41',
            'name' => 'Identify Decision Makers',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);

    }
}
