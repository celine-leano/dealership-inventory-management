<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 2/10/2019
 * 328/final-project/model/admin/login-validation.php
 *
 * Validates the admin login page
 */
global $f3;
$isValid = TRUE;

if (!empty($_POST)) {
    //validate username and password field
    $username = $_POST['username'];
    $password = $_POST['password'];
    $f3->set("username", $username);
    $f3->set("password", $password);
    if (empty($_POST['username'])) {
        $f3->set("errorAdminLogin", "Please enter a username");
        $isValid = FALSE;
    } else if ($_POST['username'] == "lmemployee") {
        $f3->set("errorAdminLogin", "Please use the employee login");
        $isValid = FALSE;
    }
    if (empty($_POST['password'])) {
        $f3->set("errorAdminLogin", "Please enter a password");
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
            $f3->set("errorAdminLogin", NULL);

            $f3->reroute("admin/tools");
        } else {
            $f3->set("errorAdminLogin", "Password is incorrect");
        }
    }
}