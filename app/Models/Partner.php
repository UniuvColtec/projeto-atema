<?php

namespace App\Models;

use App\Bootgrid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name,email,site,telephone,address,district,latitude,longitude,city_id'];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];

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
    public function partner_type(){
        return $this->belongsTo(Partner_type::class);

    }
    public function city(){
        return $this->belongsTo(City::class);

    }
}

