<?php

namespace App\Models;

use App\Bootgrid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'state'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s'];


    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $bootgrid->query($this, $request, ['name', 'state']);
        return $bootgrid;

    }
}
