
<?php

// display by Serial Number
$arraySubscribersJson = Car::listAllCarsJson($bddConn, "car", '', '', 'serialNumber', '123456789', '', '');

var_dump($arraySubscribersJson);