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

        $coordenadas->latitude = (is_numeric($latitude)?$latitude:'');
        $coordenadas->longitude = (is_numeric($longitude)?$longitude:'');

        return $coordenadas;
    }

    static public function renderMap($latitude, $longitude){
        return "
            <iframe src='https://maps.google.com/maps?q={$latitude},{$longitude}&hl=pt-br&z=17&amp;output=embed'
                width='100%'
                height='450'
                style='border:0;'
                allowfullscreen='1'
                loading='lazy'
                referrerpolicy='no-referrer-when-downgrade'>
            </iframe>
        ";
    }

}
