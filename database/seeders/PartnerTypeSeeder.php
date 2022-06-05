<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partner_types = [
            [
                'name' => 'Hotel'
            ],
            [
                'name' => 'Restaurante'
            ],
            [
                'name' => 'Companhia de Transporte'
            ],
            [
                'name' => 'Companhia de Voo'
            ],
            [
                'name' => 'Hospedaria'
            ]
        ];
        foreach ($partner_types as $partner_type) {
            DB::table('partner_types')->insert([
                'name' => $partner_type['name'],
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ]);
        }
    }
}
