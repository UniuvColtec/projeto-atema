<?php

namespace App\Models;

use App\Bootgrid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];


    public function bootgrid(object $request)
    {
        $searchPhrase = $request->searchPhrase;
        $rowCount = ($request->rowCount > 0 ? $request->rowCount : 0);
        $current = ($request->current ? ($request->current - 1) * $rowCount : 0);

        $registros = $this::where('name', 'like', "%{$searchPhrase}%");
        $registros->orWhere('state', 'like', "%{$searchPhrase}%");

        foreach ($request->sort as $item => $value) {
            $registros->orderBy($item, $value);
        }

        $bootgrid = new Bootgrid();
        $bootgrid->total = $registros->count();
        if ($rowCount > 0) {
            $bootgrid->current = $request->current;
            $bootgrid->rowCount = $rowCount;
            $bootgrid->rows = $registros->take($rowCount)->skip($current)->get();
        } else {
            $bootgrid->rows = $registros->get();
        }
        return $bootgrid;
    }
}
