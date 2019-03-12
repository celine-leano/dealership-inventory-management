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
session_start();

//Connect to DB
require('model/database.php');
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
    require("model/employee-login-db-functions.php");
    //template variable
    $template = new Template();
    echo $template->render("views/login.html");
});
// define route for input stock number after logging in
$f3->route('GET|POST /stock', function ($f3) {
    $f3->set("title", "Enter Stock Number");

    $_SESSION = array();
    require("model/employee-stock-validation.php");

    $template = new Template();
    echo $template->render("views/stock.html");
});
// define route for vehicle info after inputting a stock number
$f3->route('GET|POST /vehicle-info', function ($f3) {
    $f3->set("title", "Vehicle Information");

    $f3->set("stock", $_SESSION['stock']);


    $template = new Template();
    echo $template->render('views/vehicle-info.html');
});
// define live board route
$f3->route('GET /live', function ($f3) {
    $f3->set("title", "Live Board");
    //for testing only
    //	echo "<p>".implode(", ", getCars())."</p>";
    $template = new Template();
    echo $template->render("views/live.html");
});
// define route to admin login
$f3->route('GET|POST /admin', function ($f3) {
    //set title
    $f3->set("title", "Admin Login");
    //clear  user variables
    $username = "";
    $password = "";
    //clear user sessions
    $_SESSION['username'] = "";
    if (!empty([$_POST])) {
        //flag
        global $isValid;
        //if not empty
        //check username field
        if (isset($_POST['username'])) {
            //validate username
            $username = validateData($_POST['username']);
            //to lower case
            $username = strtolower($username);
            //assign username to session variable
            $_SESSION['username'] = $username;
            //set flag to true
            $isValid = TRUE;
        } else {
            //display errors
            $errorUsername = "Please enter a valid username.";
            $isValid = FALSE;
        }
        //check password field
        if (isset($_POST['password'])) {
            //validate password
            $password = validateData($_POST['password']);
            //set flag to true
            $isValid = TRUE;
        } else {
            //display error
            $errorPassword = "Please enter a valid password.";
            $isValid = FALSE;
        }
        //if user name and password
        if ($isValid) {
            $password = sha1($password);
            $result = login($username, $password);
            echo "<p>$result</p>";
            $template = new Template();
            echo $template->render("views/admin-tools.html");
        }
        $template = new Template();
        echo $template->render("views/admin-login.html");
    }
});
// define route to admin tools
$f3->route('GET|POST /admin/tools', function ($f3) {
    //set title
    $f3->set("title", "Admin Tools");
    $template = new Template();
    echo $template->render("views/admin-login.html");
});
// define route to admin add car
$f3->route('GET|POST /admin/add', function ($f3) {
    $f3->set("title", "Admin - Add a Vehicle");
    $template = new Template();
    echo $template->render("views/admin-add.html");
});
// run fat free
$f3->run();