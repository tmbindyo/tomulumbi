<?php

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()    {



        DB::table('accounts')->insert([
            'id' => 'ee1e792a-db44-4a11-859e-f6cd08b370e3',
            'reference' => 'zxspM',
            'name' => 'NCBA Account',
            'balance' => 0,
            'goal' => 2000000,
            'notes' => 'NCBA business account',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('accounts')->insert([
            'id' => 'cae524a1-6738-4873-923a-f599fb93f4af',
            'reference' => '1jqvG',
            'name' => 'Petty Cash',
            'balance' => 0,
            'goal' => 20000,
            'notes' => 'Physical cash always kept',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('accounts')->insert([
            'id' => 'e2bc3dbd-b04e-4430-945a-0e1e08f56ed1',
            'reference' => 'ZPmgY',
            'name' => 'Paypal',
            'balance' => 0,
            'goal' => 0,
            'notes' => 'Payments made to paypal',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('accounts')->insert([
            'id' => '881514cf-fc5e-448b-9dbc-94a997246367',
            'reference' => 'zixco',
            'name' => 'MPESA',
            'balance' => 0,
            'goal' => 0,
            'notes' => 'MPESA balance, shared with my safaricom line.',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);

    }
}
