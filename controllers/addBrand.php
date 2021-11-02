<?php

$response = file_get_contents('https://the-vehicles-api.herokuapp.com/brands/');
$abrands = json_decode($response);


// $arrayRecup = array();
// foreach ($abrands as $key) {
//     array_push($arrayRecup, $key);
// }


if (!empty($_POST) && $_POST['addAll'] == 1) {
    foreach ($abrands as $key) {
        $array = array('id_brand' => $key->id, 'name' => $key->brand);
        Brand::addBrand($bddConn, "brand", $array);
    }
}
