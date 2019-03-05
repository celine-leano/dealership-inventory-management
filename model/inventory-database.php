<?php
	/**
	 * This is the main car class used to create an Inventory Management System.
	 *
	 * @author   Celine Leano
	 * @author   Adolfo Gonzalez
	 * @version  1.0
	 *
	 * File: inventory-database.php
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
	//Connect to Inventory Database
	require_once('/home/agonzale/config.php');
	
	class Database
	{
		function connect()
		{
			try{
				//Instantiate a db object
				$dbh=new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
				return $dbh;
			}
			catch(PDOException $ex){
				echo $ex->getMessage();
				return FALSE;
			}
		}
		
		//Add  New Car
		function addCar($stock,$make,$model,$year,$updatedBy,$timeStamp,$notes)
		{
			global $dbh;
			//connect to database
			$dbh=$this->connect();
			//1. define query
			$sql="INSERT INTO inventory(stock, make, model, year, updatedBy, timestamp, notes) VALUES(:stock, :make, :model,
										:year, :updatedBy, :timestamp, :notes)";
			
			//2. prepare the statement
			$statement=$dbh->prepare($sql);
			
			//3. bind parameters
			$statement->bindParam(':stock',$stock,PDO::PARAM_STR);
			$statement->bindParam(':make',$make,PDO::PARAM_STR);
			$statement->bindParam(':model',$model,PDO::PARAM_STR);
			$statement->bindParam(':year',$year,PDO::PARAM_STR);
			$statement->bindParam(':updatedBy',$updatedBy,PDO::PARAM_STR);
			$statement->bindParam(':timestamp',$timestamp,PDO::PARAM_STR);
			$statement->bindParam(':notes',$notes,PDO::PARAM_STR);
			
			//4. execute
			return $statement->execute();
		}
		
		//get all cars
		function getCars()
		{
			//1. connect to database
			global $dbh;
			$dbh=$this->connect();
			
			//2. define query
			$sql="SELECT * FROM inventory";//maybe group by status or date
			
			//3. prepare statement
			$statement=$dbh->prepare($sql);
			
			//4. execute statement
			$statement->execute();
			
			//get results
			$results=$statement->fetch(PDO::FETCH_ASSOC);
			
			//return results
			return $results;
		}
		
		//Get Car Info/Status
		function getByStock($stock)
		{
			//1. connect to database
			global $dbh;
			$dbh=$this->connect();
			
			//2. define query
			$sql="SELECT * FROM inventory  WHERE stock = '$stock'";
			
			//3. prepare statement
			$statement=$dbh->prepare($sql);
			
			//4. statement execute
			$statement->execute();
			
			//get results
			$results=$statement->fetch(PDO::FETCH_ASSOC);
			
			//return results
			return $results;
		}
		
		//Update Car Status
		function updateStatus($stock,$status)
		{
			//1. connect to database
			global $dbh;
			$dbh=$this->connect();
			
			//2. define query
			$sql="UPDATE  inventory SET status = '$status' WHERE stock = '$stock'";
			
			//3. prepare statement
			$statement=$dbh->prepare($sql);
			
			//4. statement execute
			return $statement->execute();
			
		}
		
		function updateNotes($stock,$notes)
		{
			//1. connect to database
			global $dbh;
			$dbh=$this->connect();
			
			//2. define query
			$sql="UPDATE  inventory SET notes = '$notes' WHERE stock = '$stock'";
			
			//3. prepare statement
			$statement=$dbh->prepare($sql);
			
			//4. statement execute
			return $statement->execute();
		}
		
		//Remove Car
		function removeCar($stock)
		{
			//1. connect to database
			global $dbh;
			$dbh=$this->connect();
			
			//2. define query
			$sql="DELETE FROM  inventory  WHERE stock = '$stock'";
			
			//3. prepare statement
			$statement=$dbh->prepare($sql);
			
			//4. statement execute
			return $statement->execute();
			
		}
	}