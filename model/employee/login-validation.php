<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/7/2019
 * 328/final-project/model/employee/login-validation.php
 * Validation for employee login page
 */
global $f3;
$isValid = TRUE;

if (!empty($_POST)) {
    // validate username and password field
    $username = $_POST['username'];
    $password = $_POST['password'];
    $f3->set("username", $username);
    $f3->set("password", $password);
    if (empty($_POST['username'])) {
        $f3->set("errorEmployeeLogin", "Please enter a username");
        $isValid = FALSE;
    } else if ($username == "admin") {
        $f3->set("errorEmployeeLogin", "Please use the admin login");
        $isValid = FALSE;
    } else if ($username != "lmemployee") {
        $f3->set("errorEmployeeLogin", "Invalid username");
        $isValid = FALSE;
    } else if (empty($_POST['password'])) {
        $f3->set("errorEmployeeLogin", "Please enter a password");
        $isValid = FALSE;
    }
    if ($isValid) {
        // check that username and password are valid based on the info
        // in the database
        $success = login($username, $password);
        if ($success) {
            // allow access to admin pages
            $_SESSION['user'] = $username;

            // resets error messages
            $f3->set("errorEmployeeLogin", NULL);

            $f3->reroute("employee/stock");
        } else {
            $f3->set("errorEmployeeLogin", "Password is incorrect");
        }
    }
}

