<?php

// Modifying a car
if (!empty($_POST)) {
    $array = array('seats' => $_POST['seats'], 'licencePlate' => $_POST['licencePlate'], 'serialNumber' => $_POST['serialNumber'], 'color' => $_POST['color'], 'brand_id_brand' => $_POST['brand_id_brand'], 'model_id_model' => $_POST['model_id_model'], 'id_car' => $_POST['id_car']);
    Car::modifyCar($bddConn, $array);
}
