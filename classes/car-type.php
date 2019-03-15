<?php


/**
 * Class carType used to assign car types to car objects.
 *
 * @author   Celine Leano
 * @author   Adolfo Gonzalez
 * @version  1.0
 *
 * File: 328/final-project/classes/car-type.php
 */
class CarType extends Car
{
    //fields
    private $_type;
    private $_engine;
    private $_transmission;
    private $_fuel;


    /**
     * CarType constructor.
     *
     * @param $_type
     * @param $_engine
     * @param $_transmission
     * @param $_fuel
     */
    public function __construct($_type, $_engine, $_transmission, $_fuel)
    {
        $this -> _type = $_type;
        $this -> _engine = $_engine;
        $this -> _transmission = $_transmission;
        $this -> _fuel = $_fuel;
    }


    /**
     * Gets car type.
     *
     * @return mixed
     */
    public function getType()
    {
        return $this -> _type;
    }


    /**
     * Sets car type.
     *
     * @param mixed $type
     *
     * @return CarType
     */
    public function setType($type)
    {
        $this -> _type = $type;


        return $this;
    }


    /**
     * Gets engine type.
     *
     * @return mixed
     */
    public function getEngine()
    {
        return $this -> _engine;
    }


    /**
     * Sets engine type.
     *
     * @param mixed $engine
     *
     * @return CarType
     */
    public function setEngine($engine)
    {
        $this -> _engine = $engine;


        return $this;
    }


    /**
     * Gets transmission type.
     *
     * @return mixed
     */
    public function getTransmission()
    {
        return $this -> _transmission;
    }


    /**
     * Sets transmission type.
     *
     * @param mixed $transmission
     *
     * @return CarType
     */
    public function setTransmission($transmission)
    {
        $this -> _transmission = $transmission;


        return $this;
    }


    /**
     * TGest fuel type.
     *
     * @return mixed
     */
    public function getFuel()
    {
        return $this -> _fuel;
    }


    /**
     * Sets fuel type.
     *
     * @param mixed $fuel
     *
     * @return CarType
     */
    public function setFuel($fuel)
    {
        $this -> _fuel = $fuel;


        return $this;
    }
}