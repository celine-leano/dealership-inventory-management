<?php
	
	/**
	 * Class carType used to assign car types to car objects.
	 *
	 * @autor   Celine Leano
	 * @autor   Adolfo Gonzalez
	 * @version 1.0
	 *
	 * File: carType.php
	 */
	class CarType extends Car
	{
		//fields
		private $_type;
		private $_doors;
		private $_cylinders;
		
		/**
		 * carType constructor.
		 *
		 * @param $_stockNumber
		 * @param $year
		 * @param $make
		 * @param $model
		 * @param $status
		 */
		public function __construct($_stockNumber, $year, $make, $model, $status)
		{
			parent ::__construct($_stockNumber, $year, $make, $model, $status);
		}
		
		/**
		 * Return car type.
		 *
		 * @return mixed
		 */
		public function getType()
		{
			return $this -> _type;
		}
		
		/**
		 * Sets Type.
		 *
		 * @param $type
		 */
		public function setType($type): void
		{
			$this -> _type = $type;
		}
		
		/**
		 * Returns number of car doors.
		 *
		 * @return mixed
		 */
		public function getDoors()
		{
			return $this -> _doors;
		}
		
		/**
		 * Sets number of doors.
		 *
		 * @param $doors
		 */
		public function setDoors($doors): void
		{
			$this -> _doors = $doors;
		}
		
		/**
		 * Returns the number of cylinders.
		 *
		 * @return mixed
		 */
		public function getCylinders()
		{
			return $this -> _cylinders;
		}
		
		/**
		 * Sets the number of cylinders
		 *
		 * @param $cylinders
		 */
		public function setCylinders($cylinders): void
		{
			$this -> _cylinders = $cylinders;
		}
		
	}