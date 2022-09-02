<?php

namespace App\Models;

use App\Bootgrid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

class Typical_food extends Model
{
    use HasFactory;
    protected $fillable = [
        'name,description'];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];

    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $typical_foods = DB::table('typical_foods')
            ->join('cities', 'typical_foods.city_id', '=', 'cities.id')
            ->join('events', 'typical_foods.event_id', '=', 'events.id')
            ->select("typical_foods.*", "cities.name as city_name", "events.name as event_name");

        $bootgrid->query($typical_foods, $request, ['typical_foods.name','events.name', 'cities.name']);
        $bootgrid->query($this,$request,['name','description']);
        return $bootgrid;
    }
    public function typical_food_images(){
        return $this->hasMany(Image_typical_foods::class);
    }
    public function firstImage()
    {
        return $this->hasOne(Image_typical_foods::class)->with('image');
    }
    public function cities(){
        return $this->belongsToMany(City::class, 'typical_food_cities', 'typical_food_id', 'city_id');

    }
    public function event(){
        return $this->belongsToMany(Event::class);
    }
}
