<?php
declare(strict_types=1);

// ERROR HANDLING
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
}

//include all your model files here
require 'Model/ConnectDatabase.php';
require 'Model/Product.php';
require 'Model/Customer.php';
require 'Model/CustomerGroup.php';
require 'Model/Calculator.php';

//Loader models
require 'Model/ProductLoader.php';
require 'Model/CustomerLoader.php';
require 'Model/CustomerGroupLoader.php';

//include all your controllers here
require 'Controller/HomepageController.php';
//require 'Controller/InfoController.php';


//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new HomepageController();
//if(isset($_GET['page']) && $_GET['page'] === 'homepage') {
//    $controller = new InfoController();
//}

$controller->render($_GET, $_POST);