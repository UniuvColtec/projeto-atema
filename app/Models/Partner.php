<?php

namespace App\Models;

use App\Bootgrid;
use App\Maps;
use Cassandra\Map;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name,email,site,telephone,address,district,cnpj,latitude,longitude,status'];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];

    public const PARTNER_LOGO = '/logo/partners/';

    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $partners = DB::table('partners')
            ->join('cities', 'partners.city_id', '=', 'cities.id')
            ->join('partner_types', 'partners.partner_type_id', '=', 'partner_types.id')
            ->select("partners.*", "cities.name as city_name", "partner_types.name as partner_type_name");

        $bootgrid->query($partners, $request, ['partners.name','partner_types.name', 'site','address','district','cities.name', 'telephone']);
        return $bootgrid;

    }
    public function getCoordinates($link) {
        $coordenadas = Maps::getCoordinates($link);

        $this->latitude = $coordenadas->latitude;
        $this->longitude = $coordenadas->longitude;
    }

    public function renderMap(){
        return Maps::renderMap($this->latitude, $this->longitude);
    }

    public function getUrlLogo(){
        return asset('' . self::PARTNER_LOGO . $this->logo);
    }
    public function partner_type(){
        return $this->belongsTo(Partner_type::class);

    }
    public function partner_image(){
        return $this->hasMany(Image_partners::class);
    }
    public function city(){
        return $this->belongsTo(City::class);

    }
}

