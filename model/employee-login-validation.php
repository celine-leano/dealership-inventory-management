<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/7/2019
 * 328/final-project2/model/employee-login-validation.php
 * Validation for employee login page, and updates
 */

global $f3;

// login validation
$isValid = true;
$f3->set("errorEmployeeLogin", null);

if (!empty($_POST)) {
    // validate username and password field
    $username = $_POST['username'];
    $password = $_POST['password'];
    $f3->set("username", $username);
    $f3->set("password", $password);

    if (empty($_POST['username'])) {
        $f3->set("errorEmployeeLogin", "Please enter a username");
        $isValid = false;
    } else if ($username == "admin") {
        $f3->set("errorEmployeeLogin", "Please use the admin login");
        $isValid = false;
    } else if ($username != "lmemployee") {
        $f3->set("errorEmployeeLogin", "Invalid username");
        $isValid = false;
    } else if (empty($_POST['password'])) {
        $f3->set("errorEmployeeLogin", "Please enter a password");
        $isValid = false;
    }


    if ($isValid) {
        // check that username and password are valid based on the info
        // in the database
        $success = employeeLogin($username, $password);

        if ($success) {
            $f3->reroute("stock");
        } else {
            $f3->set("errorEmployeeLogin", "Password is incorrect");
        }
    }
}

