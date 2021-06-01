<?php

use Illuminate\Database\Seeder;

class SubTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // todo creating seeder for product type

            DB::table('sub_types')->insert([
                'id' => '7c3d68ed-354c-4d66-b881-7725626c03f4',
                'name' => 'Hoodies',
                'description' => 'Printed on a hoodie',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            ]);

            DB::table('sub_types')->insert([
                'id' => '2efa2729-6438-4397-b06d-ecded822cec3',
                'name' => 'T-Shirt',
                'description' => 'Printed on a t-shirt',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            ]);

            DB::table('sub_types')->insert([
                'id' => 'c31c3b47-4353-4916-bfc1-d38e54c49024',
                'name' => 'Vest',
                'description' => 'Printed on a vest',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => '314f08f0-2735-498a-a924-4dacf49f88f6',
            ]);





            DB::table('sub_types')->insert([
                'id' => '56f4db2f-e685-4307-99c9-52a0640fd4eb',
                'name' => 'Print',
                'description' => 'A print of a picture',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('sub_types')->insert([
                'id' => '99c79f5c-09eb-40d2-8f26-5b99cd0f98f0',
                'name' => 'Canvas',
                'description' => 'Printed on canvas',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('sub_types')->insert([
                'id' => 'cc27f162-5aad-4dd0-ab72-b85f85da67e3',
                'name' => 'Framed',
                'description' => 'Framed print album',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('sub_types')->insert([
                'id' => '0547faae-2799-4914-97b6-f016b6e049da',
                'name' => 'Post card',
                'description' => 'Post cards',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

            DB::table('sub_types')->insert([
                'id' => '43b81c57-48a3-4629-b481-8b950973743c',
                'name' => 'Cards',
                'description' => 'Cards designed and printed',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'type_id' => 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4',
            ]);

    }
}
