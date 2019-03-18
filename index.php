<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 2/10/2019
 * 328/final-project/index.php
 * Fat-Free Routing
 */
//session start
session_start();
// turn on error reporting
ini_set('display_errors', 3);
error_reporting(E_ALL);
// require autoload
require_once('vendor/autoload.php');
require('model/database.php');
//connect to db
$dbh = connect();
if (!$dbh) { //don't go any further if we can't connect to the database
    exit;
}
// create an instance of the Base class
$f3 = Base::instance();
// turn on Fat-Free error reporting
$f3->set('DEBUG', 3);
// department array
$f3->set("departments", ["detail" => "Detail", "inspection" => "Inspection", "inventoried" => "Inventoried",
    "photo-area" => "Photo Area", "paint" => "Paint", "reconditioning" => "Reconditioning",
    "ready-for-sale" => "Ready For Sale", "sales" => "Sales", "service" => "Service", "sold" => "Sold",
    "waiting-for-parts" => "Waiting For Parts", "wash" => "Wash", "wholesale" => "Wholesale"]);
// define a default route
$f3->route('GET|POST /', function ($f3) {
    //set title
    $f3->set("title", "Inventory Management");
    //template variable
    $template = new Template();
    echo $template->render("views/home.html");
});
//define employee login
$f3->route('GET|POST /login', function ($f3) {
    //set title
    $f3->set("title", "Employee Login");
    // validate login credentials
    require("model/employee-login-validation.php");
    //template variable
    $template = new Template();
    echo $template->render("views/login.html");
});
// define route for input stock number after logging in
$f3->route('GET|POST /employee/stock', function ($f3) {
    require('model/check-for-login.php');
    $f3->set("title", "Enter Stock Number");
    // clear the session
    $_SESSION['stock'] = null;
    require("model/employee-stock-validation.php");
    $template = new Template();
    echo $template->render("views/stock.html");
});
// define route for vehicle info after inputting a stock number
$f3->route('GET|POST /employee/vehicle-info', function ($f3) {
    require('model/check-for-login.php');
    $f3->set("title", "Vehicle Information");
    $stock = $_SESSION['stock'];
    $f3->set("stock", $stock);
    $stockNum = $_SESSION['stockNum'];
    $history = getHistory($stockNum);
    $f3->set("history", $history);
    $template = new Template();
    echo $template->render('views/vehicle-info.html');
});
// define route to update a vehicle's status
$f3->route('GET|POST /employee/update-status', function ($f3) {
    require('model/check-for-login.php');
    $f3->set("title", "Update Status");
    $stock = $_SESSION['stock'];
    $f3->set("stock", $stock);
    // get 'to do' list and validate update form
    require('model/employee-update-status.php');
    $template = new Template();
    echo $template->render('views/update-status.html');
});
// define route for successful update
$f3->route('GET|POST /employee/updated', function ($f3) {
    $f3->set("title", "Updated!");
    $stock = $_SESSION['stock'];
    $f3->set("stock", $stock);

    $template = new Template();
    echo $template->render('views/updated.html');
});
// define live board route
$f3->route('GET /live', function ($f3) {
    $f3->set("title", "Live Board");
    $cars = getCars();
    $f3->set("cars", $cars);
    $template = new Template();
    echo $template->render("views/live.html");
});
// define route to admin login
$f3->route('GET|POST /admin', function ($f3) {
    //set title
    $f3->set("title", "Admin Login");
    //admin validation
    require 'model/admin-login-validation.php';
    //new template
    $template = new Template();
    echo $template->render("views/admin-login.html");
});
// define route to admin tools
$f3->route('GET|POST /admin/tools', function ($f3) {
    require('model/check-for-login.php');
    //set title
    $f3->set("title", "Admin Tools");
    $template = new Template();
    echo $template->render("views/admin-tools.html");
});
// define route to admin add car
$f3->route('GET|POST /admin/add', function ($f3) {
    require('model/check-for-login.php');
    //set title
    $f3->set("title", "Admin - Add a Vehicle");
    //add car function
    require 'model/add-car.php';
    //new template
    $template = new Template();
    echo $template->render("views/admin-add.html");
});
// define route for successfully added vehicle
$f3->route('GET|POST /admin/add-success', function ($f3) {
    require('model/check-for-login.php');
    //set title
    $f3->set("title", "Vehicle Added!");
    //new template
    $template = new Template();
    echo $template->render("views/admin-car-added.html");
});
// define route to logout
$f3->route('GET|POST /logout', function ($f3) {
    $f3->set("title", "Logged out! Redirecting...");
    require 'model/logout.php';
    $template = new Template();
    echo $template->render("views/logout.html");
});
// run fat free
$f3->run();