<?php

namespace App\Models;

use App\Bootgrid;
use App\Maps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name,description,contact,start_date,final_date,address,
        district,latitude,longitude,status'];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s',
        'start_date' => 'date:d/m/Y H:m:s','final_date' => 'date:d/m/Y H:m:s',
    ];

    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $bootgrid->query($this, $request, ['name','contact','start_date','final_date', 'city_id', 'address','district','status']);
        return $bootgrid;

    }
    public function getCoordinates($link) {
        $coordenadas = Maps::getCoordinates($link);

        $this->latitude = $coordenadas->latitude;
        $this->longitude = $coordenadas->longitude;
    }

    public function renderMap($latitude, $longitude) {
        return Maps::renderMap($latitude, $longitude);
    }
    public function event_category(){
        return $this->hasMany(Event_category::class);
    }
    public function event_typical_food(){
        return $this->hasMany(Typical_event_food::class);
    }
    public function event_image(){
        return $this->hasMany(Image_events::class);
    }
    public function city(){
        return $this->belongsTo(City::class);

    }
}

