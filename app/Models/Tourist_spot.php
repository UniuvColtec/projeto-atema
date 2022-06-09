<?php

namespace App\Models;

use App\Bootgrid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tourist_spot extends Model
{
    use HasFactory;
    protected $fillable = [
        'name,description,address,district,city_id'];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];
    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $tourist_spots = DB::table('tourist_spots')
            ->join('cities', 'tourist_spots.city_id', '=', 'cities.id')
            ->select("tourist_spots.*", "cities.name as city_name");

        $bootgrid->query($tourist_spots, $request, ['address','district','cities.name', 'name']);
        return $bootgrid;

    }
    public function city(){
        return $this->belongsTo(City::class);

    }
    public function getCoordinates($link) {
        $pos = strpos( $link, "!3d");
        $latitude = substr($link, $pos+3, 11);

        $pos = strpos( $link, "!4d");
        $longitude = substr($link, $pos+3, 11);

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
    public function tourist_spot_image(){
        return $this->hasMany(Image_tourist_spots::class);
    }
}

