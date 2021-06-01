<?php

use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
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
                'name' => 'VAT',
                'amount' => '16',
                'is_percentage' => True,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Catering Levy',
                'amount' => '6',
                'is_percentage' => True,
                'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];

        foreach ($data as $entry) {
            \App\Tax::create(
                $entry
            );
        }


    }
}
