<?php

namespace App\Models;

use App\Bootgrid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];

    public function index()
    {
        return view('web.partner');
    }

    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $banners = DB::table('banners')
            ->select("banners.*");

        $bootgrid->query($banners, $request, []);
        return $bootgrid;

    }
    public function images()
    {
        return $this->hasMany(Image_banners::class)->with('image');
    }
    public function banner_image(){
        return $this->hasMany(Image_banners::class);
    }

    public function firstImage()
    {
        return $this->hasOne(Image_banners::class)->with('image');
    }
}
