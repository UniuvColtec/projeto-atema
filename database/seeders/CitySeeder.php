<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'Antônio Olinto',
                'state' => 'PR'
            ],
            [
                'name' => 'Bituruna',
                'state' => 'PR'
            ],
            [
                'name' => 'Cruz Machado',
                'state' => 'PR'
            ],
            [
                'name' => 'General Carneiro',
                'state' => 'PR'
            ],
            [
                'name' => 'Paula Freitas',
                'state' => 'PR'
            ],
            [
                'name' => 'Paulo Frontin',
                'state' => 'PR'
            ],
            [
                'name' => 'União da Vitória',
                'state' => 'PR'
            ],
            [
                'name' => 'Porto União',
                'state' => 'SC'
            ],
            [
                'name' => 'São Mateus do Sul',
                'state' => 'PR'
            ],
            [
                'name' => 'Porto Vitória',
                'state' => 'PR'
            ]
        ];
        foreach ($cities as $city) {
            DB::table('cities')->insert([
                'name' => $city['name'],
                'state' => $city['state'],
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ]);
        }
    }
}
