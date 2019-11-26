<?php

use Illuminate\Database\Seeder;

class ViewTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('view_types')->insert([
            'id' => '81e702ff-08ee-49eb-9900-d2f9703a4bbf',
            'name' => 'Home',
        ]);

        // client proof
        DB::table('view_types')->insert([
            'id' => '10200706-0362-43a6-be1a-62bcc49ddcb9',
            'name' => 'Client proof',
        ]);

        // personal album
        DB::table('view_types')->insert([
            'id' => '578275c9-48dc-469c-a62f-f13583b95696',
            'name' => 'Personal album',
        ]);

        // design
        DB::table('view_types')->insert([
            'id' => '3e5302a7-3ed6-4bfe-a7b4-1875228ade42',
            'name' => 'Designs',
        ]);

        // project
        DB::table('view_types')->insert([
            'id' => '0d7740e6-8e3c-4f25-9448-3ecf92543436',
            'name' => 'Projects',
        ]);

        // journal
        DB::table('view_types')->insert([
            'id' => '7e7445ac-aa06-4138-bab8-c28a5d7be6b9',
            'name' => 'Journals',
        ]);

        // store
        DB::table('view_types')->insert([
            'id' => '382da08a-1149-4178-9e7a-92539705f436',
            'name' => 'Store',
        ]);

    }
}
