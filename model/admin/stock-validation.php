<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/11/2019
 * 328/final-project/model/admin/stock-validation.php
 * Validates stock #
 */
global $f3;
$isValid = TRUE;

if (!empty($_POST)) {

    // validates stock number
    if (!empty($_POST['stock'])) {
        $stock = $_POST['stock'];
        if (!is_numeric($stock)) {
            $f3->set("errorStock", "Stock number cannot contain a non-numeric 
            value");
            $isValid = FALSE;
        } else if (strlen($stock) != 4) {
            $f3->set("errorStock", "Stock number must contains 4 numbers");
            $isValid = FALSE;
        }
    } else {
        // no input for stock number given
        $f3->set("errorStock", "Please enter a stock number");
        $isValid = FALSE;
    }

    if ($isValid) {
        // searches for the stock number in the db
        $success = searchStockNum($stock);

        if ($success) {
            // saves information for vehicle in the session array
            $_SESSION['stockNum'] = $stock;
            $_SESSION['car'] = $success;

            $f3->reroute("admin/remove");
        } else {
            $f3->set("errorStock", "Invalid stock number");
        }
    }
}