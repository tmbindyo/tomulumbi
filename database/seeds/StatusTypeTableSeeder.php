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

        DB::table('status_types')->insert([
            'id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'name' => 'Client Email status type',
            'description' => 'Client Email status type',
            'user_id' => 1,
        ]);

        DB::table('status_types')->insert([
            'id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'name' => 'Product status type',
            'description' => 'Product status type',
            'user_id' => 1,
        ]);

        DB::table('status_types')->insert([
            'id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'name' => 'Order status type',
            'description' => 'Order status type',
            'user_id' => 1,
        ]);

        DB::table('status_types')->insert([
            'id' => 'a2fd6d40-969f-41a8-ba35-f7aad59307d7',
            'name' => 'Sale status type',
            'description' => 'Sale status type',
            'user_id' => 1,
        ]);

        DB::table('status_types')->insert([
            'id' => '7805a9f3-c7ca-4a09-b021-cc9b253e2810',
            'name' => 'Expense status type',
            'description' => 'Expense status type',
            'user_id' => 1,
        ]);

        DB::table('status_types')->insert([
            'id' => '8f56fc70-6cd8-496f-9aec-89e5748968db',
            'name' => 'Transaction status type',
            'description' => 'Transaction status type',
            'user_id' => 1,
        ]);

    }
}
