<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 2/10/2019
 * 328/final-project/db-functions.php
 * Fat-Free Routing
 */

/**
 * Queries login information to the server and brings back what it finds
 *
 * @param $username
 * @param $password
 *
 * @return mixed
 */
function login($username, $password)
{
    global $dbh;
    $sql = "SELECT * FROM logins WHERE username = '$username'
            AND password = SHA1('$password')";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result;
}


/**
 * Looks up stock number in database
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
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();

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
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();

    return $results;
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
    $statement = $dbh->prepare($sql);
    //4. execute statement
    $statement->execute();
    //get results
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);


    //return results
    return $results;
}

/**
 * This method updates the status of a car using the default information
 *
 * @param $stock
 * @param $status
 *
 * @return bool
 */
function addDefaultInfo($stock, $make, $model, $year, $status, $updatedBy)
{
    global $dbh;
    $sql = "INSERT INTO inventory (stock, make, model, year, status, updatedBy) 
            VALUES (:stock, :make, :model, :year, :status, :updatedBy)";
    $statement = $dbh->prepare($sql);
    //bind parameters
    $statement->bindParam(':stock', $stock, PDO::PARAM_STR);
    $statement->bindParam(':make', $make, PDO::PARAM_STR);
    $statement->bindParam(':model', $model, PDO::PARAM_STR);
    $statement->bindParam(':year', $year, PDO::PARAM_STR);
    $statement->bindParam(':status', $status, PDO::PARAM_STR);
    $statement->bindParam(':updatedBy', $updatedBy, PDO::PARAM_STR);

    return $statement->execute();
}


/**
 * This method updates the status of a car when choosing to add additional information
 *
 * @param $stock
 * @param $status
 *
 * @return bool
 */
function addAdditionalInfo($stock, $make, $model, $year, $status, $updatedBy, $notes, $budget)
{
    global $dbh;
    $sql = "INSERT INTO inventory (stock, make, model, year, status, updatedBy, notes, budget) 
            VALUES (:stock, :make, :model, :year, :status, :updatedBy, :notes, :budget)";
    $statement = $dbh->prepare($sql);
    //bind parameters
    $statement->bindParam(':stock', $stock, PDO::PARAM_STR);
    $statement->bindParam(':make', $make, PDO::PARAM_STR);
    $statement->bindParam(':model', $model, PDO::PARAM_STR);
    $statement->bindParam(':year', $year, PDO::PARAM_STR);
    $statement->bindParam(':status', $status, PDO::PARAM_STR);
    $statement->bindParam(':updatedBy', $updatedBy, PDO::PARAM_STR);
    $statement->bindParam(':notes', $notes, PDO::PARAM_STR);
    $statement->bindParam(':budget', $budget, PDO::PARAM_STR);


    return $statement->execute();
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
    $statement = $dbh->prepare($sql);


    //4. statement execute
    return $statement->execute();
}