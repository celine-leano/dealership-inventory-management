<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 2/10/2019
 * 328/final-project/model/admin-login-validation.php
 * Fat-Free Routing
 */
//route variable
global $f3;
// login flag for validation
$isValid = TRUE;
$f3 -> set("errorPassword", NULL);
if(!empty($_POST))
{
    //validate username and password field
    $username = $_POST['username'];
    $password = $_POST['password'];
    $f3 -> set("username", $username);
    $f3 -> set("password", $password);
    if(empty($_POST['username']))
    {
        $f3 -> set("errorUsername", "Please enter a username");
        $isValid = FALSE;
    }
    if(empty($_POST['password']))
    {
        $f3 -> set("errorPassword", "Please enter a password");
        $isValid = FALSE;
    }
    if($isValid)
    {
        // check that username and password are valid based on the info
        // in the database
        $password = strtolower($password);
        $password = SHA1($password);
        $success = adminLogin($username, $password);
        if($success)
        {
            $_SESSION['username'] = $username;
            $f3 -> reroute("admin/tools");
        }
        else
        {
            $f3 -> set("errorLogin", "Password is incorrect");
        }
    }
}