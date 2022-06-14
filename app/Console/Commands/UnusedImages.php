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


        $db = DB::connection();
        $resultImages = $db::query("SELECT id FROM images WHERE id NOT IN (SELECT id FROM image_events) AND NOT IN (SELECT id FROM image_tourist_spots)
         AND NOT IN (SELECT id FROM image_typical_foods");

        if( $resultImages>1){
             foreach  ($resultImages as $resultImage){
                 $image = Image::find($resultImage->id);
                 $image->delete();

             }

            return Response::responseSuccess();
        } else {
           return Response::responseForbiden();
        }
    }

}

