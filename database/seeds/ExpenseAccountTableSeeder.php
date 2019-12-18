<?php

use Illuminate\Database\Seeder;

class ExpenseAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('expense_account')->insert([
            'id' => '3664bd74-6680-4951-af57-3412d520e895',
            'name' => 'Advertising and Marketing',
            'code' => 'A&M',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => 'd4d0aa9b-4d7d-4a5b-a08b-70620a3b4f65',
            'name' => 'Automobile Expense',
            'code' => 'AE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '1092751f-e8a0-4333-a299-60448badbacd',
            'name' => 'Bad Debt',
            'code' => 'BD',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => 'f55210fc-08f2-4f98-9570-9cb3785050d7',
            'name' => 'Bank Fees and Charges',
            'code' => 'BF&C',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '0e003daf-d79d-45cc-a2fc-883248ce87b3',
            'name' => 'Consultant Expense',
            'code' => 'CE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => 'd73d7c8c-60d8-4130-b677-fbac9715702a',
            'name' => 'Credit Card Charges',
            'code' => 'CCC',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '992fc533-b325-44b5-b2fd-de15ca8b2209',
            'name' => 'Cost Of Goods Sold',
            'code' => 'COGS',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '4e722702-d811-4415-9a06-32333146ae6c',
            'name' => 'Depreciation Expense',
            'code' => 'DE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '4011f0a6-e620-411b-b6ff-62e2a08e7b55',
            'name' => 'Discount',
            'code' => 'D',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '14cb5413-370e-47a8-80d5-4eb6bd4ea142',
            'name' => 'Gear',
            'code' => 'G',
            'description' => 'Account to track gear acquired',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '13cef891-f45e-4796-ab0f-e4783fe9b121',
            'name' => 'IT and Internet Expenses',
            'code' => 'IT&IE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => 'cf0aa095-318a-4327-ba08-aac0ef17e158',
            'name' => 'Janitorial Expense',
            'code' => 'JE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '893d738a-e67b-4fbf-bdf9-39115ad28027',
            'name' => 'Lodging',
            'code' => 'L',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '96982b67-7904-4c0b-bc9b-7d17e599f4a2',
            'name' => 'Meals and Entertainment',
            'code' => 'M&E',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => 'b1eeadc4-0ef1-46e3-8c37-3ab3edeb0073',
            'name' => 'Office Supplies',
            'code' => 'OS',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => 'f5b2aae3-4c80-492b-9a90-091fe170341d',
            'name' => 'Other Expenses',
            'code' => 'OE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => 'b54e977d-adc9-4c45-968b-899781fb5ae8',
            'name' => 'Parking',
            'code' => 'Pa',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '2044d6b4-681b-40f0-a246-3714e1743525',
            'name' => 'Postage',
            'code' => 'Po',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '4be74ac0-5468-4b0f-9dbf-26401908b542',
            'name' => 'Printing and Stationery',
            'code' => 'P&S',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '843e9644-412d-4c48-b422-4a9b60b83835',
            'name' => 'Printing and Stationery',
            'code' => 'P&S',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '5c7554a8-9ccf-4531-8352-03dd1f2f2227',
            'name' => 'Rent Expense',
            'code' => 'RE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => 'dd7f309a-2977-4f62-bb5b-03d4744c6772',
            'name' => 'Repairs and Maintenance',
            'code' => 'R&M',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '7969a4b1-6822-40de-815f-f743e24e8c54',
            'name' => 'Salaries and Employee Wages',
            'code' => 'S&EW',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '42454ea5-20ea-4fec-aea4-38f6b6a87c74',
            'name' => 'Shipping Charge',
            'code' => 'SC',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => 'bfa41b87-85ff-43f4-ad6a-e2736a9f802b',
            'name' => 'Telephone Expenses',
            'code' => 'TeE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '7af6d4a1-5000-452a-9d92-172b59021a90',
            'name' => 'Transaction Expense',
            'code' => 'TranE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '9040dfcc-c942-453c-97f6-f16c5ee5f8fb',
            'name' => 'Travel Expense',
            'code' => 'TravE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('expense_account')->insert([
            'id' => '060ca285-9b41-409c-9353-d983b161e7aa',
            'name' => 'Uncategorized',
            'code' => 'UE',
            'description' => 'Account to track the Cost Of Goods Sold',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
