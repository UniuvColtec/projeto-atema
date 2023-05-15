<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Banner;
use App\Models\Image_banners;
use Illuminate\Database\Seeder;

class ImageBannerSeeder extends Seeder
{
    public function run()
    {
        // Criando um registro na tabela images
        $image = Image::create([
            'address' => 'banner.png',
        ]);

        // Criando um registro na tabela banners
        $banner = Banner::create([
        ]);

        // Criando um registro na tabela image_banners
        $image_banner = new Image_banners;
        $image_banner->image_id = $image->id;
        $image_banner->banner_id = $banner->id;
        $image_banner->save();
    }
}

