<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 2/10/2019
 * 328/final-project/db-functions.php
 * Fat-Free Routing
 *
 *
 * This function validates admin login.
 *
 * @param $username
 * @param $password
 *
 * @return mixed
 */
function adminLogin($username, $password)
{
    global $dbh;
    //1. Define query
    $sql = "SELECT * FROM logins WHERE username = '$username' and password = '$password'";
    //2. Prepare statement
    $statement = $dbh -> prepare($sql);
    //execute
    $statement -> execute();
    //fetch password
    $result = $statement -> fetchColumn(1);
    //compare results and return true if match
    if($result === $password)
    {
        return TRUE;
    }


    //return false if password not a match
    return FALSE;
}


/**
 * This function validates employee login.
 *
 * @param $username
 * @param $password
 *
 * @return mixed
 */
function employeeLogin($username, $password)
{
    global $dbh;
    $sql = "SELECT * FROM logins WHERE username = '$username'
            AND password = SHA1('$password')";
    $statement = $dbh -> prepare($sql);
    $statement -> execute();
    $result = $statement -> fetch(PDO::FETCH_ASSOC);


    return $result;
}


/**
 * This function allows the user to search by stock number.
 *
 * @param $stock
 *
 * @return mixed
 */
function searchStockNum($stock)
{
    global $dbh;
    $sql = "SELECT * FROM inventory s1
        WHERE timestamp = (
        SELECT MAX(timestamp)
        FROM inventory s2
        WHERE s1.stock = s2.stock
        AND stock = '$stock')";
    $statement = $dbh -> prepare($sql);
    $statement -> execute();
    $result = $statement -> fetch();


    return $result;
}


/**
 * This functions retrieves car history and related info.
 *
 * @param $stock
 *
 * @return array
 */
function getHistory($stock)
{
    global $dbh;
    $sql = "SELECT * FROM inventory WHERE stock = '$stock' ORDER BY timestamp DESC";
    $statement = $dbh -> prepare($sql);
    $statement -> execute();
    $results = $statement -> fetchAll();


    return $results;
}


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
    $sql = "INSERT INTO inventory(stock, make, model, year, status) VALUES(:stock, :make, :model, :year,  :status)";
    //2. prepare the statement
    $statement = $dbh -> prepare($sql);
    //3. bind parameters
    $statement -> bindParam(':stock', $stock, PDO::PARAM_STR);
    $statement -> bindParam(':make', $make, PDO::PARAM_STR);
    $statement -> bindParam(':model', $model, PDO::PARAM_STR);
    $statement -> bindParam(':year', $year, PDO::PARAM_STR);
    $statement -> bindParam(':status', $status, PDO::PARAM_STR);


    //4. execute
    return $statement -> execute();
}


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
    $sql = "SELECT i1.stock, i1.make, i1.model, i1.year, i1.status,
            i1.updatedBy, i1.timestamp 
            FROM inventory i1 WHERE timestamp = (SELECT MAX(timestamp) 
            FROM inventory i2 WHERE i1.stock = i2.stock)
            AND i1.active=1 ORDER BY timestamp desc";
    //3. prepare statement
    $statement = $dbh -> prepare($sql);
    //4. execute statement
    $statement -> execute();
    //get results
    $results = $statement -> fetchAll(PDO::FETCH_ASSOC);


    //return results
    return $results;
}


/**
 * This method updates the status of a car given a stock number.
 *
 * @param $stock
 * @param $status
 *
 * @return bool
 */
function updateStatus($stock, $make, $model, $year, $status, $updatedBy, $notes, $budget)
{
    global $dbh;
    $sql = "INSERT stock, make, model, year, status, updatedBy, notes, budget INTO inventory
            VALUES (:stock, :make, :model, :year, :status, :updatedBy, :notes, :budget)";
    $statement = $dbh -> prepare($sql);
    //bind parameters
    $statement -> bindParam(':stock', $stock, PDO::PARAM_STR);
    $statement -> bindParam(':make', $make, PDO::PARAM_STR);
    $statement -> bindParam(':model', $model, PDO::PARAM_STR);
    $statement -> bindParam(':year', $year, PDO::PARAM_STR);
    $statement -> bindParam(':status', $status, PDO::PARAM_STR);
    $statement -> bindParam(':updatedBy', $updatedBy, PDO::PARAM_STR);
    $statement -> bindParam(':notes', $notes, PDO::PARAM_STR);
    $statement -> bindParam(':budget', $budget, PDO::PARAM_STR);


    return $statement -> execute();
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
    $statement = $dbh -> prepare($sql);


    //4. statement execute
    return $statement -> execute();
}


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
    $statement = $dbh -> prepare($sql);


    //4. statement execute
    return $statement -> execute();
}
