<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypicalFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typical_foods = [
            [
                'name' => 'Piroque',
                'description' => 'Tradição dos imigrantes poloneses de Santa Catarina, o pirogue (ou "pierog") é um pastel salgado cozido fácil de fazer e que faz muito sucesso na época do Natal. Itaiópolis é um pedaço da Polônia antiga no Brasil. A cidade tem 20 mil habitantes e cerca de 90% são descendentes de poloneses.',
                'image' => 'a'
            ],
            [
                'name' => 'Holubtsi',
                'description' => 'O holubtsi, também conhecido por charuto, é um enroladinho de repolho recheado com arroz e trigo-sarraceno, com um delicioso molho de carne. O perohe é mais comum, mas ambos são elementares na culinária ucraniana entre as famílias imigrantes de Curitiba. ',
                'image' => 'a'
            ]
        ];
        foreach ($typical_foods as $typical_food) {
            DB::table('typical_foods')->insert([
                'name' => $typical_food['name'],
                'description' => $typical_food['description'],
                'image' => $typical_food['image'],
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ]);
        }
    }
}
