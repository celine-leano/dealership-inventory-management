<?php
	/**
	 * Class CarServices used to track services done  to Car objects.
	 *
	 * @autor   Celine Leano
	 * @autor   Adolfo Gonzalez
	 * @version 1.0
	 *
	 * File: CarServiceType.php
	 */
	class CarService extends Car
	{
		//fields
		private $serviceType;
		private $price;
		
		/**
		 * CarServices constructor.
		 *
		 * @param $_stockNumber
		 * @param $year
		 * @param $make
		 * @param $model
		 * @param $color
		 */
		public function __construct($_stockNumber, $year, $make, $model, $color)
		{
			parent ::__construct($_stockNumber, $year, $make, $model, $color);
		}
		
		/**
		 * @return mixed
		 */
		public function getServiceType()
		{
			return $this -> serviceType;
		}
		
		/**
		 * @param mixed $serviceType
		 *
		 * @return CarServices
		 */
		public function setServiceType($serviceType)
		{
			$this -> serviceType = $serviceType;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getPrice()
		{
			return $this -> price;
		}
		
		/**
		 * @param mixed $price
		 *
		 * @return CarServices
		 */
		public function setPrice($price)
		{
			$this -> price = $price;
			return $this;
		}
	}