<?php
	
	/**
	 * This is the main car class used to create an Inventory Management System.
	 *
	 * @author   Celine Leano
	 * @author   Adolfo Gonzalez
	 * @version  1.0
	 *
	 * File: car-info.php
	 */
	class CarInfo
	{
		//fields
		private $_stock;
		private $_year;
		private $_make;
		private $_model;
		private $_status;
		
		/**
		 * This is the constructor for the car class.
		 *
		 * @param $_stockNumber
		 * @param $type
		 * @param $year
		 * @param $make
		 * @param $model
		 * @param $status
		 */
		public function __construct($stock,$year,$make,$model,$status)
		{
			$this->_setStockNumber($stock);
			$this->_setYear($year);
			$this->_setMake($make);
			$this->_setModel($model);
			$this->_setColor($status);
		}
		
		/**
		 * Getter for stockNumber;
		 *
		 * @return $stockNumber
		 */
		public function getStock()
		{
			return $this->_stock;
		}
		
		/**
		 * Setter for stockNumber;
		 *
		 * @param $stockNumber
		 */
		public function setStock($stock)
		{
			$this->_stock=$stock;
		}
		
		/**
		 * Getter for vahicle year.
		 *
		 * @return $year
		 */
		public function getYear()
		{
			return $this->_year;
		}
		
		/**
		 * Setter for vehivle year.
		 *
		 * @param $year
		 */
		public function setYear($year)
		{
			$this->_year=$year;
		}
		
		/**
		 * Getter for make of vehicle.
		 *
		 * @return $make
		 *
		 */
		public function getMake()
		{
			return $this->_make;
		}
		
		/**
		 * Setter for make
		 *
		 * @param $make
		 */
		public function setMake($make)
		{
			$this->_make=$make;
		}
		
		/**
		 * Getter for vehicle model.
		 *
		 * @return model
		 */
		public function getModel()
		{
			return $this->_model;
		}
		
		/**
		 * Setter for vehicle model
		 *
		 * @param $model
		 */
		public function setModel($model)
		{
			$this->_model=$model;
		}
		
		/**
		 * Getter for vehicle color.
		 *
		 * @return $color
		 */
		public function getStatus()
		{
			return $this->_status;
		}
		
		/**
		 * Setter to set vehicle color.
		 *
		 * @param $status
		 */
		public function setStatus($status)
		{
			$this->_status=$status;
		}
	}