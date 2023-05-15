<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Image_banners;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    public function run()
    {
        // Criando o registro na tabela images
        $image = Image::create([
            'address' => 'banner.png',
        ]);

        // Criando o registro na tabela image_banners
        $image_banner = new Image_banners;
        $image_banner->image_id = $image->id; // Utilizando o id criado na tabela images
        $image_banner->banner_id = 1;
        $image_banner->save();
    }
}
