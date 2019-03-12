<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 2/10/2019
 * 328/final-project/db-functions.php
 * Fat-Free Routing
 */
//validation page
//Login
/**
 * @param $username
 * @param $password
 *
 * @return mixed
 */
function login($username, $password)
{
    global $dbh;
    //1. Define query
    $sql = "SELECT * FROM logins WHERE username = '$username' and password = '$password'";
    //2. Prepare statement
    $statement = $dbh->prepare($sql);
    //execute
    $statement->execute();
    $result = $statement->fetch();
    if ($result == $password) {
        return $valid = "valid";
    }
    return $invalid = "invalid";
}

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

// Stock number look-up
function searchStockNum($stock)
{
    global $dbh;

    $sql = "SELECT * FROM inventory WHERE stock = '$stock'";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
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
 * @param $status
 *
 * @return bool
 */
function addCar($stock, $make, $model, $year, $status)
{
    global $dbh;
    //1. define query
    $sql = "INSERT INTO inventory(stock, make, model, year, status) VALUES(:stock, :make, :model,
										:year, :updatedBy, :status)";
    //2. prepare the statement
    $statement = $dbh->prepare($sql);
    //3. bind parameters
    $statement->bindParam(':stock', $stock, PDO::PARAM_STR);
    $statement->bindParam(':make', $make, PDO::PARAM_STR);
    $statement->bindParam(':model', $model, PDO::PARAM_STR);
    $statement->bindParam(':year', $year, PDO::PARAM_STR);
    $statement->bindParam(':status', $status, PDO::PARAM_STR);
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
    $sql = "UPDATE  inventory SET status  = 0 WHERE stock = '$stock'";
    //3. prepare statement
    $statement = $dbh->prepare($sql);
    //4. statement execute
    return $statement->execute();
}

//test data
/**
 * This function is used to check input;
 *
 * @param $data
 *
 * @return string
 */
function validateData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}