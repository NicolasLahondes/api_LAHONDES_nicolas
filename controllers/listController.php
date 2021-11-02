<?php

// display all cars
$arraySubscribersJson = Car::listAllCarsJson($bddConn, "car", '', '', '', '', '', '');

var_dump($arraySubscribersJson);

