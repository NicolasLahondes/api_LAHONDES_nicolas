<?php 

    $response = file_get_contents('https://the-vehicles-api.herokuapp.com/brands/');
    $abrands = json_decode($response);

    var_dump($abrands);