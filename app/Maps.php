<?php

namespace App;

class Maps
{
    static public function getCoordinates($link) {
        $coordenadas = new \stdClass();
        $pos = strpos( $link, "!3d");
        $latitude = substr($link, $pos+3, 11);

        $pos = strpos( $link, "!4d");
        $longitude = substr($link, $pos+3, 11);

        $coordenadas->latitude = $latitude;
        $coordenadas->longitude = $longitude;

        return $coordenadas;
    }

    static public function renderMap($latitude, $longitude){
        return '';
    }

}
