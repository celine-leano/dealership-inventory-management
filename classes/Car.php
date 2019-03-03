<?php
	
	/**
	 * This is the main car class used to create an Inventory Management System.
	 *
	 * @autor   Celine Leano
	 * @autor   Adolfo Gonzalez
	 * @version 1.0
	 *
	 * File: Car.php
	 */
	class Car
	{
		//fields
		private $_stockNumber;
		private $year;
		private $make;
		private $model;
		private $color;
		
		/**
		 * This is the constructor for the car class.
		 *
		 * @param $_stockNumber 4digit number
		 * @param $type
		 * @param $year
		 * @param $make
		 * @param $model
		 * @param $color
		 */
		public function __construct($_stockNumber, $year, $make, $model, $color)
		{
			$this -> setStockNumber($_stockNumber);
			$this -> setYear($year);
			$this -> setMake($make);
			$this -> setModel($model);
			$this -> setColor($color);
			
		}
		
		/**
		 * Getter for stockNumber;
		 *
		 * @return $stockNumber
		 */
		public function getStockNumber()
		{
			return $this -> _stockNumber;
		}
		
		/**
		 * Setter for stockNumber;
		 *
		 * @param $stockNumber
		 */
		public function setStockNumber($stockNumber): void
		{
			$this -> _stockNumber = $stockNumber;
		}
		
		/**
		 * Getter for vahicle year.
		 *
		 * @return $year
		 */
		public function getYear()
		{
			return $this -> year;
		}
		
		/**
		 * Setter for vehivle year.
		 *
		 * @param $year
		 */
		public function setYear($year): void
		{
			$this -> year = $year;
		}
		
		/**
		 * Getter for make of vehicle.
		 *
		 * @return $make
		 *
		 */
		public function getMake()
		{
			return $this -> make;
		}
		
		/**
		 * Setter for make
		 *
		 * @param $make
		 */
		public function setMake($make): void
		{
			$this -> make = $make;
		}
		
		/**
		 * Getter for vehicle model.
		 *
		 * @return model
		 */
		public function getModel()
		{
			return $this -> model;
		}
		
		/**
		 * Setter for vehicle model
		 *
		 * @param $model
		 */
		public function setModel($model): void
		{
			$this -> model = $model;
		}
		
		/**
		 * Getter for vehicle color.
		 *
		 * @return $color
		 */
		public function getColor()
		{
			return $this -> color;
		}
		
		/**
		 * Setter to set vehicle color.
		 *
		 * @param $color
		 */
		public function setColor($color): void
		{
			$this -> color = $color;
		}
		
	}