<?php

namespace App;

class Bootgrid
{
    public $current;
    public $rowCount;
    public $rows;
    public $total;

    public function query($model, $request='', $fields = [] )
    {
        $searchPhrase = $request->searchPhrase;
        $rowCount = ($request->rowCount > 0 ? $request->rowCount : 0);
        $current = ($request->current ? ($request->current - 1) * $rowCount : 0);

        if(count($fields)>0 AND $searchPhrase!=''){
            $query = $model->where($fields[0], 'like', "%{$searchPhrase}%");
            for ($i=1; $i<count($fields); $i++){
                $query->orWhere($fields[$i], 'like', "%{$searchPhrase}%");
            }
        }else{
            $query = $model;
        }

        foreach ($request->sort as $item => $value) {
            $query->orderBy($item, $value);
        }

        $this->total = $query->count();
        if ($rowCount > 0) {
            $this->current = $request->current;
            $this->rowCount = $rowCount;
            $this->rows = $query->take($rowCount)->skip($current)->get();
        } else {
            $this->rows = $query->get();
        }
    }

    public function setCurrent($value){
        if ( is_numeric($value) ) $this->current = $value;
    }

}
