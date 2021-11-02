
<?php

// autoload all well named classes from /models
spl_autoload_register(function ($class_name) {
    require_once 'models/' . $class_name . '.php';
});



$bddConn = new Connexion('localhost', 'datacar', 'root', 'nevolepasmesdonnéescindy');

if (!empty($_GET['action'])) {
    switch ($_GET['action']) {

        case "list":
            include "controllers/listController.php";
            break;
        case "listSerial":
            include "controllers/listSerialController.php";
            break;
        case "add":
            include "controllers/addController.php";
            break;
        case "delete":
            include "controllers/deleteController.php";
            break;
        case "modify":
            include "controllers/modifyController.php";
            break;
        case "apiCall":
            include "controllers/apiCallController.php";
            break;
        case "addBrand":
            include "controllers/addBrand.php";
            break;
    
    }
}

?>