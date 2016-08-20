<?php
/**
 * Created by PhpStorm.
 * User: Phil&Gaelle
 * Date: 19/08/2016
 * Time: 17:36
 */

function tronque($chaine, $longueur = 120){
    if (empty ($chaine)) {
        return "";
    } elseif (strlen ($chaine) < $longueur) {
        return $chaine;
    } elseif (preg_match ("/(.{1,$longueur})\s./ms", $chaine, $match)) {
        return $match [1] . "...";
    } else {
        return substr ($chaine, 0, $longueur) . "...";
    }
}

function getImgRandom(){
    $arrayImg = array("abstract", "animals", "business", "cats", "city", "food", "nightlife", "fashion", "people", "nature", "sports", "technics", "transport");
    $valueImg = array_rand(array_flip($arrayImg), 1);
    $number = rand(1,10);
    $img = "http://lorempixel.com/400/200/".$valueImg."/".$number."/";
    return $img;
}