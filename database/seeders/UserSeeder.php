<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Vinicius',
                'email' => 'vinicius@gmail.com',
                'password' => 'vini123',
                'city_id' => '2'
            ],
            [
                'name' => 'Bianca',
                'email' => 'bianca@gmail.com',
                'password' => 'bianca123',
                'city_id' => '2'
            ],
            [
                'name' => 'Otávio',
                'email' => 'otavio@gmail.com',
                'password' => 'otavio123',
                'city_id' => '1'
            ],
            [
                'name' => 'Ricardo',
                'email' => 'ricardo@gmail.com',
                'password' => 'ricardo123',
                'city_id' => '2'
            ]
        ];
        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'city_id' => $user['city_id'],
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ]);
        }
    }
}
