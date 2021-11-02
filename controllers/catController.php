<?php

// Get list of cats
$response = file_get_contents('https://api.thecatapi.com/v1/breeds?limit=100&page=0');
$aCats = json_decode($response);


// target the cat seleted by user and catch it's data
if (!empty($_POST) && (!empty($_POST['catName']))) :
    foreach ($aCats as $key) :
        if ($key->name == $_POST['catName']) :
            $catInfo = $key;
        endif;
    endforeach;
endif;

// require view
require_once 'views/catView.php';
