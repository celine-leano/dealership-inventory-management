<?php
/** This class is optional: extends the CarInfo class and allows to create notes and budget
 *  for an object.
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
     * AdditionalInfo constructor
     *
     * @param $stock
     * @param $year
     * @param $make
     * @param $model
     * @param $status
     * @param $notes
     * @param $budget
     */
    function __construct($stock, $year, $make, $model, $status, $updatedBy, $notes, $budget)
    {
        parent::__construct($stock, $year, $make, $model, $status, $updatedBy);
        $this->_notes = $notes;
        $this->_budget = $budget;
    }

    /**
     * Gets notes related to car info
     *
     * @return mixed notes
     */
    function getNotes()
    {
        return $this->_notes;
    }

    /**
     * Sets notes about the car
     *
     * @param $notes
     */
    function setNotes($notes)
    {
        $this->_notes = $notes;
    }

    /**
     * Gets budget for car
     *
     * @return mixed
     */
    function getBudget()
    {
        return $this->_budget;
    }

    /**
     * Sets budget
     *
     * @param $budget set budget
     */
    function setBudget($budget)
    {
        $this->_budget = $budget;
    }
}