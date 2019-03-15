<?php


/** This class is optional but extend the Car class and allows to create notes and budget for a car object.
 *
 * @author   Celine Leano
 * @author   Adolfo Gonzalez
 * @version  1.0
 *
 * File: 328/final-project/classes/car-type.php
 */
class AdditionalInfo extends CarInfo
{
    // fields
    private $_notes;
    private $_budget;


    /**
     * CarInfo constructor.
     *
     * @param $_notes
     * @param $_budget
     */
    public function __construct($_notes, $_budget)
    {
        $this -> _notes = $_notes;
        $this -> _budget = $_budget;
    }


    /**
     * Gets notes related to car info.
     *
     * @return mixed notes
     */
    function getNotes()
    {
        return $this -> _notes;
    }


    /**
     * Sets notes about the car.
     *
     * @param $notes set note
     */
    function setNotes($notes)
    {
        $this -> _notes = $notes;
    }


    /**
     * Gets budget for car
     *
     * @return mixed gets budget
     */
    function getBudget()
    {
        return $this -> _budget;
    }


    /**
     * Sets budget.
     *
     * @param $budget set budget
     */
    function setBudget($budget)
    {
        $this -> _budget = $budget;
    }
}