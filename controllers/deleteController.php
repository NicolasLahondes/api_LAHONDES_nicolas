<?php

// delete a car from table car
if (!empty($_POST)) {
    Car::deleteCar($bddConn, $_POST['id_car'], "car");
}
