<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/1/2019
 * 328/final-project/database/db-functions.php
 * Database functions
 */

/**
 * Queries login information to the server and brings back what it finds
 *
 * @param string $username the username for the account
 * @param string $password the password for the account
 * @return mixed returns result of fetching data from the db
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
 * @param int $stock the stock number for the car
 * @return mixed returns results from fetching data from the db
 */
function searchStockNum($stock)
{
    global $dbh;
    $sql = "SELECT * FROM inventory s1 WHERE timestamp = (SELECT MAX(timestamp) 
        FROM inventory s2 WHERE s1.stock = s2.stock AND stock = '$stock')";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result;
}


/**
 * Retrieves car history and related info
 *
 * @param int $stock the car's stock number
 * @return array returns all entrys for this stock number
 */
function getHistory($stock)
{
    global $dbh;
    $sql = "SELECT * FROM inventory WHERE stock = '$stock' 
            ORDER BY timestamp DESC";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    return $results;
}

/**
 * Returns all recent entries for each car in the db
 *
 * @return mixed returns results for fetching the data from the db
 */
function getCars()
{
    global $dbh;
    $sql = "SELECT i1.stock, i1.make, i1.model, i1.year, i1.status,
            i1.updatedBy, i1.timestamp FROM inventory i1 
            WHERE timestamp = (SELECT MAX(timestamp) 
            FROM inventory i2 WHERE i1.stock = i2.stock)
            AND i1.active=1 ORDER BY timestamp desc";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

/**
 * Adds entry to the database using the default information
 *
 * @param int $stock the stock number
 * @param string $make the make of the car
 * @param string $model the model of the car
 * @param int $year the year of the car
 * @param string $status the status of the car
 * @param string $updatedBy the name of the employee or department
 * @return bool returns true if successful
 */
function addDefaultInfo($stock, $make, $model, $year, $status, $updatedBy)
{
    global $dbh;
    $sql = "INSERT INTO inventory (stock, make, model, year, status, updatedBy) 
            VALUES (:stock, :make, :model, :year, :status, :updatedBy)";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(':stock', $stock, PDO::PARAM_STR);
    $statement->bindParam(':make', $make, PDO::PARAM_STR);
    $statement->bindParam(':model', $model, PDO::PARAM_STR);
    $statement->bindParam(':year', $year, PDO::PARAM_STR);
    $statement->bindParam(':status', $status, PDO::PARAM_STR);
    $statement->bindParam(':updatedBy', $updatedBy, PDO::PARAM_STR);
    return $statement->execute();
}


/**
 * Adds entry to the database using additional information
 *
 * @param int $stock the stock number
 * @param string $make the make of the car
 * @param string $model the model of the car
 * @param int $year the year of the car
 * @param string $status the status of the car
 * @param string $updatedBy the name of the employee or department
 * @param string $notes notes for the car
 * @param int $budget the budget for the car
 * @return bool returns true if successful
 */
function addAdditionalInfo($stock, $make, $model, $year, $status, $updatedBy, $notes, $budget)
{
    global $dbh;
    $sql = "INSERT INTO inventory (stock, make, model, year, status, updatedBy, 
    notes, budget) VALUES (:stock, :make, :model, :year, :status, :updatedBy, 
    :notes, :budget)";
    $statement = $dbh->prepare($sql);
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
 * Removes a car from the database
 *
 * @param int $stock stock number
 * @return bool returns true if successfully deleted
 */
function removeCar($stock)
{
    global $dbh;
    $sql = "DELETE FROM inventory WHERE stock = '$stock'";
    $statement = $dbh->prepare($sql);
    return $statement->execute();
}