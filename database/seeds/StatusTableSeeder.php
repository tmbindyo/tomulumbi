<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Project status
        DB::table('statuses')->insert([
            'id' => 'f6654b11-8f04-4ac9-993f-116a8a6ecaae',
            'name' => 'Ongoing',
            'label' => 'label-danger',
            'description' => 'Ongoing',
            'status_type_id' => 'e6dc4713-612f-455e-a30c-3e29ebdddf70',
            'user_id' => 1,
        ]);
        DB::table('statuses')->insert([
            'id' => '0fa108dc-22b6-40d9-911b-f692ec90e4a4',
            'name' => 'Preview',
            'label' => 'label-warning',
            'description' => 'Preview',
            'status_type_id' => 'e6dc4713-612f-455e-a30c-3e29ebdddf70',
            'user_id' => 1,
        ]);
        DB::table('statuses')->insert([
            'id' => 'a6c4c2cc-95ca-4ecf-8ce3-3d08512aad15',
            'name' => 'Completed',
            'label' => 'label-success',
            'description' => 'Completed',
            'status_type_id' => 'e6dc4713-612f-455e-a30c-3e29ebdddf70',
            'user_id' => 1,
        ]);


        // Record status
        DB::table('statuses')->insert([
            'id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'name' => 'Active',
            'label' => 'label-primary',
            'description' => 'Active record',
            'status_type_id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'user_id' => 1,
        ]);
        DB::table('statuses')->insert([
            'id' => '402c447e-939f-41b3-bf4b-82a3faecc3db',
            'name' => 'Inactive',
            'label' => 'label-danger',
            'description' => 'Inactive record',
            'status_type_id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'user_id' => 1,
        ]);
        DB::table('statuses')->insert([
            'id' => 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a',
            'name' => 'Deleted',
            'label' => 'label-danger',
            'description' => 'Deleted record',
            'status_type_id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'user_id' => 1,
        ]);

        // Image or album status
        DB::table('statuses')->insert([
            'id' => 'cad5abf4-ed94-4184-8f7a-fe5084fb7d56',
            'name' => 'Preview',
            'label' => 'label-warning',
            'description' => 'Preview album or image',
            'status_type_id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'user_id' => 1,
        ]);
        DB::table('statuses')->insert([
            'id' => '389842b7-a010-40c1-85cf-4f5b5144ccea',
            'name' => 'Hidden',
            'label' => 'label-warning',
            'description' => 'Hidden album or image',
            'status_type_id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'user_id' => 1,
        ]);
        DB::table('statuses')->insert([
            'id' => 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5',
            'name' => 'Published',
            'label' => 'label-success',
            'description' => 'Published album or image',
            'status_type_id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'user_id' => 1,
        ]);



        // todo add statuses for todo
        DB::table('statuses')->insert([
            'id' => 'f3df38e3-c854-4a06-be26-43dff410a3bc',
            'name' => 'Pending',
            'description' => 'Pending',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
        ]);
        DB::table('statuses')->insert([
            'id' => '2a2d7a53-0abd-4624-b7a1-a123bfe6e568',
            'name' => 'In progress',
            'description' => 'In progress',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
        ]);
        DB::table('statuses')->insert([
            'id' => 'facb3c47-1e2c-46e9-9709-ca479cc6e77f',
            'name' => 'Completed',
            'label' => 'label-primary',
            'description' => 'Completed',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
        ]);
        DB::table('statuses')->insert([
            'id' => '99372fdc-9ca0-4bca-b483-3a6c95a73782',
            'name' => 'Overdue',
            'description' => 'Overdue',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
        ]);



    }
}
