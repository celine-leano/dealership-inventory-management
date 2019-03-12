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

if (!empty($_POST)) {
    // validate username field
    $username = $_POST['username'];
    $f3->set("username", $username);
    if (empty($_POST['username'])) {
        $f3->set("errorUsername", "Please enter a username");
        $isValid = false;
    } else if ($username == "admin") {
        $f3->set("errorUsername", "Please use the admin login");
        $isValid = false;
    } else if ($username != "lmemployee") {
        $f3->set("errorUsername", "Invalid username");
        $isValid = false;
    }

// validate password field
    $password = $_POST['password'];
    if (empty($_POST['password'])) {
        $f3->set("errorPassword", "Please enter a password");
        $isValid = false;
    }

    if ($isValid) {
        // check that username and password are valid based on the info
        // in the database
        $success = employeeLogin($username, $password);

        if ($success) {
            $f3->reroute("stock");
        } else {
            $f3->set("errorLogin", "Username or password is incorrect");
        }
    }
}

