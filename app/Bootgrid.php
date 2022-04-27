<?php

namespace App;

class Bootgrid
{
    public $current;
    public $rowCount;
    public $rows;
    public $total;

    public function setCurrent($value){
        if ( is_numeric($value) ) $this->current = $value;
    }

    // public function getJson(){

    // }
}
