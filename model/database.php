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
	 * updatedBy varchar(40),
	 * timestamp datetime,
	 * notes blob,
	 * active tynyint(1),
	 * budget varchar(10)
	 * );
	 *
	 * CREATE TABLE logins (username varchar(25), password varchar(25))
	 *
	 * INSERT INTO logins VALUES ("lmemployee", SHA1("")), ("admin", SHA1(""));
	 ***************************************************************************
	 */
	// Connect to Inventory Database
	require_once('/home/agonzale/config.php');
	/**
	 * This method connect to the inventory database.
	 *
	 * @return bool|\PDO
	 */
	function connect()
	{
		try{
			//Instantiate a db object
			$dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			return $dbh;
		}
		catch(PDOException $ex){
			echo $ex -> getMessage();
			return FALSE;
		}
	}

	//require validation
	require_once('model/validation.php');
