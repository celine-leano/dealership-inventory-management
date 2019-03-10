<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/10/2019
 * 328/final-project/classes/additional-info.php
 * Class that extends from CarInfo that allows a car to have
 * additional information (optional)
 */

/**
 * Class AdditionalInfo - object that has additional information such as
 * notes and budget
 */
class AdditionalInfo extends CarInfo
{
    // fields
    private $_notes;
    private $_budget;

    // constructor

    /**
     * AdditionalInfo constructor.
     * @param $stockNumber stock number
     * @param $year year car was manufactured
     * @param $make car make
     * @param $model car model
     * @param $status department that the car completed last
     */
    function __construct($stockNumber, $year, $make, $model, $status)
    {
        parent::__construct($stockNumber, $year, $make, $model, $status);
    }

    // getters and setters

    /**
     * Gets the notes made for the car
     * @return mixed notes
     */
    function getNotes() {
        return $this->_notes;
    }

    /**
     * Sets note for car
     * @param $notes set note
     */
    function setNotes($notes) {
        $this->_notes = $notes;
    }

    /**
     * Gets budget for car
     * @return mixed gets budget
     */
    function getBudget() {
        return $this->_budget;
    }

    /**
     * Sets budget
     * @param $budget set budget
     */
    function setBudget($budget) {
        $this->_budget = $budget;
    }
}