<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/20/2019
 * 328/final-project/model/admin/check-stock.php
 *
 * Used for ajax to see if stock number is taken
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'model/database/db-functions.php';

// query db for stock number
if (isset($_POST['stock'])) {
    $result = searchStockNum($_POST['stock']);
    if ($result) {
        echo "success";
    }
}