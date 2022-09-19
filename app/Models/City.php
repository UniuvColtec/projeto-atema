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

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function typical_food()
    {
        return $this->belongsToMany(Typical_food::class);
    }
    public function tourist_spots()
    {
        return $this->hasMany(Tourist_spot::class);
    }
    public function partners()
    {
        return $this->hasMany(Partner::class);
    }
}
