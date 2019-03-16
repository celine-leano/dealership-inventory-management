<?php


/** This class is optional but extend the Car class and allows to create notes and budget for a car object.
 *
 * @author   Celine Leano
 * @author   Adolfo Gonzalez
 * @version  1.0
 *
 * File: 328/final-project/classes/additional-info.php
 */
class AdditionalInfo extends CarInfo
{
    // fields
    private $_notes;
    private $_budget;

    /**
     * AdditionalInfo constructor.
     *
     * @param $stock stock number
     * @param $year year car was manufactured
     * @param $make car make
     * @param $model car model
     * @param $status department that the car completed last
     */
    function __construct($stock,$year,$make,$model,$status,$updatedBy,$notes,$budget)
    {
        parent::__construct($stock,$year,$make,$model,$status,$updatedBy);
        $this->_notes = $notes;
        $this->_budget = $budget;
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