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
                'email' => 'info@tolumumbi.com',
                'email_verified_at' => now(),
                'password' => Hash::make('jN56Fi3@G96avgYa'),
                'user_type_id' => '0c31d2c0-8cd9-4c0e-8f67-d313d8e482c6',
            ],
            [
                'name' => 'Thomas Mulumbi',
                'email' => 'tomulumbi@tomulumbi.com',
                'email_verified_at' => now(),
                'password' => Hash::make('zC^2$m@45QycTUNO'),
                'user_type_id' => '0c31d2c0-8cd9-4c0e-8f67-d313d8e482c6',
            ],
            [
                'name' => 'Tomulumbi User',
                'email' => 'user@tomulumbi.com',
                'email_verified_at' => now(),
                'password' => Hash::make('zC^2$m@45QycTUNO'),
                'user_type_id' => '98c9e635-9f29-4add-a51c-f05276d85442',
            ],
            [
                'name' => 'Tomulumbi Client',
                'email' => 'client@tomulumbi.com',
                'email_verified_at' => now(),
                'password' => Hash::make('zC^2$m@45QycTUNO'),
                'user_type_id' => 'b7afd524-7dda-4ec6-be04-8677c155f1d0',
            ]
        ];

        foreach ($data as $entry) {
            \App\User::create(
                $entry
            );
        }
    }
}
