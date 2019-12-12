<?php

use Illuminate\Database\Seeder;

class FrequencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('frequencies')->insert([
            'id' => '3aa43370-2877-46c3-b6f4-1c0b6aef92f6',
            'name' => 'Daily',
            'type' => 'day',
            'frequency' => '1',
            'user_id' => 1,
        ]);

        DB::table('frequencies')->insert([
            'id' => '11bde94f-e686-488e-9051-bc52f37df8cf',
            'name' => 'Weekly',
            'type' => 'week',
            'frequency' => '1',
            'user_id' => 1,
        ]);

        DB::table('frequencies')->insert([
            'id' => '488bb73e-d5a3-4e4c-9dda-25f207f27c4c',
            'name' => 'Bi Weekly',
            'type' => 'week',
            'frequency' => '2',
            'user_id' => 1,
        ]);

        DB::table('frequencies')->insert([
            'id' => '6c401203-b697-43f0-9c4d-b5a58e93f861',
            'name' => 'Monthly',
            'type' => 'month',
            'frequency' => '1',
            'user_id' => 1,
        ]);

        DB::table('frequencies')->insert([
            'id' => '300fbbee-9c14-4b54-82cb-7076abfc345b',
            'name' => 'Quarterly',
            'type' => 'month',
            'frequency' => '3',
            'user_id' => 1,
        ]);

        DB::table('frequencies')->insert([
            'id' => '02940587-ff97-47d9-8fa9-06c94827bd5b',
            'name' => 'Semiannually',
            'type' => 'month',
            'frequency' => '6',
            'user_id' => 1,
        ]);

        DB::table('frequencies')->insert([
            'id' => '37e1bdf-37c1-4962-81fe-1186fab4b456',
            'name' => 'Annually',
            'type' => 'year',
            'frequency' => '1',
            'user_id' => 1,
        ]);

        DB::table('frequencies')->insert([
            'id' => 'de217726-8544-442b-a767-b20fdb570527',
            'name' => 'Bi Annually',
            'type' => 'year',
            'frequency' => '2',
            'user_id' => 1,
        ]);

    }
}
