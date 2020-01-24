<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Test1',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'balance' => 100000,
                'created_at' => '2020-01-19 20:05:06',
                'updated_at' => '2020-01-19 20:05:06',
            ],
            [
                'id' => 2,
                'name' => 'Test2',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'balance' => 300000,
                'created_at' => '2020-01-19 20:05:06',
                'updated_at' => '2020-01-19 20:05:06',
            ],
            [
                'id' => 3,
                'name' => 'Test3',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'balance' => 5000,
                'created_at' => '2020-01-19 20:05:06',
                'updated_at' => '2020-01-19 20:05:06',
            ]
        ];

        foreach ($users as $user) {

            DB::table('users')->insert([
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'balance' => $user['balance'],
                'created_at' => $user['created_at'],
                'updated_at' => $user['updated_at'],
            ]);

        }


    }
}
