<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_partners extends Model
{
    use HasFactory;
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];

    public function image(){
        return $this->belongsTo(Image::class);
    }
    public function firstImage()
    {
        return $this->hasOne(Image::class)->latest();
    }
}

