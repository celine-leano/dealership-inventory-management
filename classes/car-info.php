<?php
/**
 * An object that stores car information
 *
 * @author   Celine Leano
 * @author   Adolfo Gonzalez
 * @version  1.0
 *
 * File: 328/final-project/classes/car-info.php
 */
class Parent_CarInfo
{
    //fields
    private $_stock;
    private $_year;
    private $_make;
    private $_model;
    private $_status;
    private $_updatedBy;

    /**
     * Car constructor
     *
     * @param int $stock Stock number of the car
     * @param string $make The car's make
     * @param string $model The car's model
     * @param int $year The car's year
     * @param string $status Most recently completed status
     * @param string $updatedBy Employee or department who/that updated the info
     */
    public function __construct($stock, $make, $model, $year, $status, $updatedBy)
    {
        $this->_stock = $stock;
        $this->_make = $make;
        $this->_model = $model;
        $this->_year = $year;
        $this->_status = $status;
        $this->_updatedBy = $updatedBy;
    }

    /**
     * Gets stock number
     *
     * @return int gets the stock number
     */
    public function getStock()
    {
        return $this->_stock;
    }

    /**
     * Sets stock number
     *
     * @param int $stock stock number
     */
    public function setStock($stock)
    {
        $this->_stock = $stock;
    }

    /**
     * Gets make of car
     *
     * @return string returns the make of the car
     */
    public function getMake()
    {
        return $this->_make;
    }

    /**
     * Sets make of car
     *
     * @param string $make the make of the car
     */
    public function setMake($make)
    {
        $this->_make = $make;
    }

    /**
     * Gets car model
     *
     * @return string returns the model of the car
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * Sets car model
     *
     * @param string $model the model of the car
     */
    public function setModel($model)
    {
        $this->_model = $model;
    }

    /**
     * Gets year
     *
     * @return int returns the year of the car
     */
    public function getYear()
    {
        return $this->_year;
    }

    /**
     * Sets year
     *
     * @param int $year the year of the car
     */
    public function setYear($year)
    {
        $this->_year = $year;
    }

    /**
     * Gets car status
     *
     * @return string return the status
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * Sets car status
     *
     * @param string $status the status the car is in
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    /**
     * Gets the employee / department
     *
     * @return string the employee / department name
     */
    public function getUpdatedBy()
    {
        return $this->_updatedBy;
    }

    /**
     * Sets the employee / department
     *
     * @param string $updatedBy the employee / department name
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->_updatedBy = $updatedBy;
    }
}