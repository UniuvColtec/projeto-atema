<?php

namespace App\Models;

use App\Bootgrid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'address'];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];



    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $bootgrid->query($this, $request, ['address']);
        return $bootgrid;
    }

}

