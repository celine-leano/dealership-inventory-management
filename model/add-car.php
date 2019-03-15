<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/7/2019
 * 328/final-project/model/add-car.php
 *
 * This files validates the input fields needed to create a car object;
 */
//global $f3 variable
global $f3;
//flag
$isValid = TRUE;
//on submit
if(!empty($_POST))
{
    // check that stock is numeric
    if(isset($_POST['stock']))
    {
        $stock = $_POST['stock'];
        if(!is_numeric($stock))
        {
            $f3 -> set("errorStock", "Only use numbers for stock.");
            $isValid = FALSE;
        }
        else if(strlen($stock) != 4)
        {
            // check if input is 4 numbers
            $f3 -> set("errorStock", "Stock is a 4 digit number.");
            $isValid = FALSE;
        }
        else
        {
            $f3 -> set("errorStock", "Please enter a stock number");
            $isValid = FALSE;
        }
        $_SESSION['stock'] = $stock;
    }
    // check that year is numeric
    if(isset($_POST['year']))
    {
        $year = $_POST['year'];
        if(!is_numeric($year))
        {
            $f3 -> set("errorYear", "Only use numbers for year.");
            $isValid = FALSE;
        }
        else if(strlen($year) != 4)
        {
            // check if input is 4 numbers
            $f3 -> set("errorYear", "Year is a 4 digit number.");
            $isValid = FALSE;
        }
        else
        {
            $f3 -> set("errorYear", "Please enter a valid year.");
            $isValid = FALSE;
        }
        $_SESSION['year'] = $year;
    }
    // check make
    if(isset($_POST['make']))
    {
        $make = $_POST['make'];
        $_SESSION['make'] = $make;
    }
    else
    {
        $f3 -> set("errorMake", "Enter make of the vehicle.");
        $isValid = FALSE;
    }
    // check model
    if(isset($_POST['model']))
    {
        $model = $_POST['model'];
        $_SESSION['model'] = $model;
    }
    else
    {
        $f3 -> set("errorModel", "Enter model of the vehicle.");
        $isValid = FALSE;
    }
    //check status
    if(isset($_POST['status']))
    {
        $status = $_POST['status'];
        $_SESSION['status'] = $status;
    }
    // check name
    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
        $_SESSION['name'] = $name;
    }
    //check notes
    if(isset($_POST['notes']))
    {
        $notes = $_POST['notes'];
        $_SESSION['notes'] = $notes;
    }
}
if($isValid)
{
    addCar($_SESSION['stock'], $_SESSION['make'], $_SESSION['model'], $_SESSION['year'], $_SESSION['status']);
    echo "Success - new car added.";
}