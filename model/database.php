<?php
/**
 * This is the main car class used to create an Inventory Management System.
 *
 * @author   Celine Leano
 * @author   Adolfo Gonzalez
 * @version  1.0
 *
 * File: database.php
 *
 ********************************************************************
 *CREATE TABLE inventory
 * (
 * stock int(4),
 * make varchar(20),
 * model varchar(20),
 * year int(4),
 * status varchar(40),
 * updatedBy varchar(40)
 * );
 *
 * CREATE TABLE logins (username varchar(25), password varchar(25))
 *
 * INSERT INTO logins VALUES ("lmemployee", SHA1("")), ("admin", SHA1(""));
 ***************************************************************************
 */
// Connect to Inventory Database
require_once('/home/cleanogr/config.php');

/**
 * This method connect to the inventory database.
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

// Employee Login
function employeeLogin($username, $password)
{
    global $dbh;

    $sql = "SELECT * FROM logins WHERE username = '$username' 
            AND password = SHA1('$password')";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;


}

// Add New Car
/**
 * This method creates a new car object with the given parameters.
 *
 * @param $stock
 * @param $make
 * @param $model
 * @param $year
 * @param $updatedBy
 * @param $timeStamp
 * @param $notes
 *
 * @return bool
 */
function addCar($stock, $make, $model, $year, $updatedBy, $notes)
{
    global $dbh;

    //1. define query
    $sql = "INSERT INTO inventory(stock, make, model, year, updatedBy, notes) VALUES(:stock, :make, :model,
										:year, :updatedBy, :notes)";

    //2. prepare the statement
    $statement = $dbh->prepare($sql);

    //3. bind parameters
    $statement->bindParam(':stock', $stock, PDO::PARAM_STR);
    $statement->bindParam(':make', $make, PDO::PARAM_STR);
    $statement->bindParam(':model', $model, PDO::PARAM_STR);
    $statement->bindParam(':year', $year, PDO::PARAM_STR);
    $statement->bindParam(':updatedBy', $updatedBy, PDO::PARAM_STR);
    $statement->bindParam(':notes', $notes, PDO::PARAM_STR);

    //4. execute
    return $statement->execute();
}

//get all cars
/**
 * This method returns all cars in the database.
 *
 * @return mixed
 */
function getCars()
{
    //1. connect to database
    global $dbh;

    //2. define query
    $sql = "SELECT * FROM inventory";//maybe group by status or date

    //3. prepare statement
    $statement = $dbh->prepare($sql);

    //4. execute statement
    $statement->execute();

    //get results
    $results = $statement->fetch(PDO::FETCH_ASSOC);

    //return results
    return $results;
}

//Get Car Info/Status
/**
 * This method retrives a car with a given stock number.
 *
 * @param $stock
 *
 * @return mixed
 */
function getByStock($stock)
{
    global $dbh;

    //2. define query
    $sql = "SELECT * FROM inventory  WHERE stock = '$stock'";

    //3. prepare statement
    $statement = $dbh->prepare($sql);

    //4. statement execute
    $statement->execute();

    //get results
    $results = $statement->fetch(PDO::FETCH_ASSOC);

    //return results
    return $results;
}

//Update Car Status
/**
 * This method uptates the status of a car given a stock number.
 *
 * @param $stock
 * @param $status
 *
 * @return bool
 */
function updateStatus($stock, $status)
{
    //1. connect to database
    global $dbh;

    //2. define query
    $sql = "UPDATE  inventory SET status = '$status' WHERE stock = '$stock'";

    //3. prepare statement
    $statement = $dbh->prepare($sql);

    //4. statement execute
    return $statement->execute();

}

/**
 * This method updates notes given a stock number.
 *
 * @param $stock
 * @param $notes
 *
 * @return bool
 */
function updateNotes($stock, $notes)
{
    //1. connect to database
    global $dbh;

    //2. define query
    $sql = "UPDATE  inventory SET notes = '$notes' WHERE stock = '$stock'";

    //3. prepare statement
    $statement = $dbh->prepare($sql);

    //4. statement execute
    return $statement->execute();
}

//Remove Car
/**
 * This method removes a car from the database given a stock number.
 *
 * @param $stock
 *
 * @return bool
 */
function removeCar($stock)
{
    //1. connect to database
    global $dbh;

    //2. define query
    $sql = "DELETE FROM  inventory  WHERE stock = '$stock'";

    //3. prepare statement
    $statement = $dbh->prepare($sql);

    //4. statement execute
    return $statement->execute();

}