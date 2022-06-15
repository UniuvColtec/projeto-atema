<?php

namespace App\Console\Commands;

use App\Models\Image;
use App\Models\Image_events;
use App\Response;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UnusedImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unusedimages:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fileDir = base_path('public/' . env('FILE_UPLOAD')) . '/';
        $images = DB::table('images')->whereRaw("id NOT IN (SELECT id FROM image_events) AND id NOT IN (SELECT id FROM image_tourist_spots)
         AND id NOT IN (SELECT id FROM image_typical_foods)")->get();


        if ($images->count() > 0) {
            foreach ($images as $image) {
                @unlink($fileDir . $image->address);
                @unlink($fileDir . 'thumbnail/' . $image->address);
                Image::find($image->id)->delete();
            }


        }

    }
}

