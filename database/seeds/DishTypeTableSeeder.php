<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DishTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Apetizer and Snacks',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Bread',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Cake',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Candy',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Casserole',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Cocktail',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Cookie',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Condiment',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Pasta',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Pie',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Pizza',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Salad',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Sandwich',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Sauce',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Smoothie',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Soup',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Stew',
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]

        ];

        foreach ($data as $entry) {
            \App\DishType::create(
                $entry
            );
        }


    }
}
