<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 2/20/2019
 * 328/final-project/model/database/database.php
 *
 * Validates the admin login page
 */

require_once('/home/cleanogr/config.php');
/**
 * Connects to the database
 *
 * @return bool|\PDO
 */
function connect()
{
    try {
        //Instantiate a db object
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        return $dbh;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        return FALSE;
    }
}

// require database functions
require_once('model/database/db-functions.php');
