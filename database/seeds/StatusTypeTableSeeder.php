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
            'name' => 'Project',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'name' => 'Record',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'name' => 'Image/Album',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'name' => 'To do',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'name' => 'Client Email',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'name' => 'Product',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'name' => 'Order',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => 'a2fd6d40-969f-41a8-ba35-f7aad59307d7',
            'name' => 'Sale',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => '7805a9f3-c7ca-4a09-b021-cc9b253e2810',
            'name' => 'Expense',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => '8f56fc70-6cd8-496f-9aec-89e5748968db',
            'name' => 'Transaction',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => '4e730295-3dc3-44a4-bff8-149e66a51493',
            'name' => 'Campaign',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => '67dda04f-e6ab-4374-a969-76e29f500f52',
            'name' => 'Lead',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'name' => 'Deal',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status_types')->insert([
            'id' => '61aeb9aa-b965-4bb6-88f5-1e97114470bd',
            'name' => 'Contact',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
