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
                'name' => 'Admin',
                'email' => 'admin@tolumumbi.com',
                'email_verified_at' => now(),
                'password' => Hash::make('jN56Fi3@G96avgYa'),
                'user_type_id' => '0c31d2c0-8cd9-4c0e-8f67-d313d8e482c6',
            ],
            [
                'name' => 'Thomas Mulumbi',
                'email' => 'info@tomulumbi.com',
                'email_verified_at' => now(),
                'password' => Hash::make('zC^2$m@45QycTUNO'),
                'user_type_id' => '0c31d2c0-8cd9-4c0e-8f67-d313d8e482c6',
            ]
        ];

        foreach ($data as $entry) {
            \App\User::create(
                $entry
            );
        }
    }
}
