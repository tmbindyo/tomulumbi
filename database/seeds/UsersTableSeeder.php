<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
                'name' => 'Admin Admin',
                'email' => 'admin@argon.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'user_type_id' => \App\UserType::all()[0]['id'],
            ],
            [
                'name' => 'Brady Trujillo',
                'email' => 'investor@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'user_type_id' => \App\UserType::all()[2]['id'],
            ],
            [
                'name' => 'Ella Martinez',
                'email' => 'projectmanager@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'user_type_id' => \App\UserType::all()[3]['id'],
            ]
        ];

        foreach ($data as $entry) {
            \App\User::create(
                $entry
            );
        }
    }
}
