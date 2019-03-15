<?php


/**
 * This is the main car class used to create an Inventory Management System.
 *
 * @author   Celine Leano
 * @author   Adolfo Gonzalez
 * @version  1.0
 *
 * File: 328/final-project/classes/car.php
 */
class Car
{
    //fields
    private $_stock;
    private $_year;
    private $_make;
    private $_model;
    private $_status;


    /**
     * Car constructor.
     *
     * @param $_stock
     * @param $_make
     * @param $_model
     * @param $_year
     * @param $_status
     */
    public function __construct($_stock, $_make, $_model, $_year, $_status)
    {
        $this -> _stock = $_stock;
        $this -> _make = $_make;
        $this -> _model = $_model;
        $this -> _year = $_year;
        $this -> _status = $_status;
    }


    /**
     * Gets stock number.
     *
     * @return mixed
     */
    public function getStock()
    {
        return $this -> _stock;
    }


    /**
     * Sets Stock number.
     *
     * @param mixed $stock
     *
     * @return Car
     */
    public function setStock($stock)
    {
        $this -> _stock = $stock;


        return $this;
    }


    /**
     * Gets year.
     *
     * @return mixed
     */
    public function getYear()
    {
        return $this -> _year;
    }


    /**
     * Sets year.
     *
     * @param mixed $year
     *
     * @return Car
     */
    public function setYear($year)
    {
        $this -> _year = $year;


        return $this;
    }


    /**
     * Gets make of car.
     *
     * @return mixed
     */
    public function getMake()
    {
        return $this -> _make;
    }


    /**
     * Sets make of car.
     *
     * @param mixed $make
     *
     * @return Car
     */
    public function setMake($make)
    {
        $this -> _make = $make;


        return $this;
    }


    /**
     * Gets car model
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this -> _model;
    }


    /**
     * Sets car model.
     *
     * @param mixed $model
     *
     * @return Car
     */
    public function setModel($model)
    {
        $this -> _model = $model;


        return $this;
    }


    /**
     * Gets car status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this -> _status;
    }


    /**
     * Sets car status.
     *
     * @param mixed $status
     *
     * @return Car
     */
    public function setStatus($status)
    {
        $this -> _status = $status;


        return $this;
    }
}