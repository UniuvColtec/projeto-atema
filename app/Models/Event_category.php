<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_category extends Model
{
    use HasFactory;
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];


    public function event()
    {
        return $this->belongsToMany(Event::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

