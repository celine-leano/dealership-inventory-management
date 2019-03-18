<?php
/**
 *  This class is optional: extends the CarInfo class and allows to create notes and budget
 *  for an object.
 *
 * @author   Celine Leano
 * @author   Adolfo Gonzalez
 * @version  1.0
 *
 * File: 328/final-project/classes/additional-info.php
 */
class Child_AdditionalInfo extends Parent_CarInfo
{
    // fields
    private $_notes;
    private $_budget;

    /**
     * AdditionalInfo constructor
     *
     * @param int $stock Stock number of the car
     * @param string $make The car's make
     * @param string $model The car's model
     * @param int $year The car's year
     * @param string $status Most recently completed status
     * @param string $updatedBy Employee or department who/that updated the info
     * @param string $notes additional information for the car
     * @param int $budget the maximum amount the business will spend
     */
    function __construct($stock, $year, $make, $model, $status, $updatedBy,
                         $notes, $budget)
    {
        parent::__construct($stock, $year, $make, $model, $status, $updatedBy);
        $this->_notes = $notes;
        $this->_budget = $budget;
    }

    /**
     * Gets notes related to car info
     *
     * @return string returns notes
     */
    function getNotes()
    {
        return $this->_notes;
    }

    /**
     * Sets notes about the car
     *
     * @param string $notes the notes for the car
     */
    function setNotes($notes)
    {
        $this->_notes = $notes;
    }

    /**
     * Gets budget for car
     *
     * @return int the budget for the car
     */
    function getBudget()
    {
        return $this->_budget;
    }

    /**
     * Sets budget
     *
     * @param int $budget the budget for the car
     */
    function setBudget($budget)
    {
        $this->_budget = $budget;
    }
}