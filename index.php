<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 2/10/2019
 * 328/final-project/index.php
 * Fat-Free Routing
 */

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require autoload
require_once('vendor/autoload.php');

// create an instance of the Base class
$f3 = Base::instance();

// turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

// define a default route
$f3->route('GET|POST /', function($f3) {
    $f3->set("title", "Key Management");

    $template = new Template();
    echo $template->render("views/home.html");
});

// define login route
$f3->route('GET|POST /login', function($f3) {
   $f3->set("title", "Employee Login");

   $template = new Template();
   echo $template->render("views/login.html");
});

// define live board route
$f3->route('GET /live', function($f3) {
    $f3->set("title", "Live Board");

    $template = new Template();
    echo $template->render("views/live.html");
});

// run fat free
$f3->run();