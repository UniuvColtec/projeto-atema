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
    public function index()
    {
        $cities = City::join('name')->get(['id', 'name']);
        $partner_types = Partner_type::join('name')->get(['id', 'name']);
        return view('web.partner',compact('partner_types', 'cities'));
    }

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
    public function images()
    {
        return $this->hasMany(Image_partners::class)->with('image');
    }
    public function partner_image(){
        return $this->hasMany(Image_partners::class);
    }

    public function firstImage()
    {
        return $this->hasOne(Image_partners::class)->with('image');
    }
    public function city(){
        return $this->belongsTo(City::class);

    }
    public function partner_type(){
        return $this->belongsTo(Partner_type::class);
    }
    public function validar_cnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;

        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
}

