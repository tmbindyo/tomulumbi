<?php

use Illuminate\Database\Seeder;

class ThumbnailSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('thumbnail_sizes')->insert([
            'id' => '3bae5d1c-f3a6-408f-8468-cfe15de6c343',
            'name' => 'Extra Small',
            'reference' => 'small-block-grid-2 medium-block-grid-3 large-block-grid-6',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('thumbnail_sizes')->insert([
            'id' => '2e515a6e-dcb3-46c8-aca4-120edf83b579',
            'name' => 'Small',
            'reference' => 'small-block-grid-2 medium-block-grid-3 large-block-grid-5',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('thumbnail_sizes')->insert([
            'id' => '36400ca6-68d0-4897-b22f-6bc04bbaa929',
            'name' => 'Medium',
            'reference' => 'small-block-grid-2 medium-block-grid-3 large-block-grid-4',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('thumbnail_sizes')->insert([
            'id' => '88a1f1ca-40b0-49a0-bf0e-d8a27eedfda3',
            'name' => 'Large',
            'reference' => 'small-block-grid-2 medium-block-grid-3 large-block-grid-3',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);
        DB::table('thumbnail_sizes')->insert([
            'id' => '875912e5-f58f-4dca-a24f-7fb3cb03fbf7',
            'name' => 'Extra Large',
            'reference' => 'small-block-grid-2 medium-block-grid-3 large-block-grid-2',
            'user_id' => 1,
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
        ]);

    }
}
