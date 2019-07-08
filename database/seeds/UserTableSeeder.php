<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
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
                'name' => 'info',
                'email' => 'info@tolumumbi.com',
                'email_verified_at' => now(),
                'password' => Hash::make('jN56Fi3@G96avgYa'),
                'user_type_id' => 1,
            ],
            [
                'name' => 'Thomas Mulumbi',
                'email' => 'tomulumbi@tomulumbi.com',
                'email_verified_at' => now(),
                'password' => Hash::make('zC^2$m@45QycTUNO'),
                'user_type_id' => 1,
            ]
        ];

        foreach ($data as $entry) {
            \App\User::create(
                $entry
            );
        }
    }
}
