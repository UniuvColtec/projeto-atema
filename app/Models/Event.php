<?php

namespace App\Models;

use App\Bootgrid;
use App\Maps;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name,subtitle,description,contact,website,start_date,final_date,address,
        district,latitude,longitude,status'];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s',
        'start_date' => 'date:d/m/Y H:m:s','final_date' => 'date:d/m/Y H:m:s',
    ];
    public const EVENT_LOGO = '/logo/events/';

    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $events = DB::table('events')
            ->join('cities','events.city_id','=','cities.id')
            ->select("events.*","cities.name as city_name");

        $bootgrid->query($events, $request, ['name','contact','start_date','final_date', 'city_name', 'address','district','status']);
        return $bootgrid;

    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->showDate();
        });

        self::updating(function($model){
            $model->showDate();
        });
    }

    public function showDate()
    {
        if (!$this->start_date || !$this->final_date) return;

        $start_date = Carbon::create($this->start_date);
        $final_date = Carbon::create($this->final_date);

        if ($start_date->month != $final_date->month){
            $this->show_date = "{$start_date->day} de {$start_date->monthName} à {$final_date->day} de {$final_date->monthName}";
        }else if ($start_date->day != $final_date->day){
            $this->show_date = "{$start_date->day} à {$final_date->day} de {$final_date->monthName}";
        }else{
            $this->show_date = "{$final_date->day} de {$final_date->monthName}";
        }
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
    public function getUrlLogo(){
        return asset('' . self::EVENT_LOGO . $this->logo);
    }
    public function event_image(){
        return $this->hasMany(Image_events::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->hasMany(Image_events::class)->with('image');
    }

    public function firstImage()
    {
        return $this->hasOne(Image_events::class)->with('image');
    }

}

