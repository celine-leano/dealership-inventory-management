<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/7/2019
 * 328/final-project/model/admin/add-car.php
 *
 * This files validates the input fields needed to add a car object
 * to the database
 */
global $f3;
$isValid = TRUE;

// validates form when it is submitted
if (!empty($_POST)) {
    // validates stock number
    if (!empty($_POST['stock'])) {
        $stock = $_POST['stock'];

        // searches stock number for a duplicate TODO: replace with AJAX
        $found = searchStockNum($stock);
        if ($found) {
            $f3->set("errorStock", "Vehicle with this stock number already 
            exists");
            $isValid = FALSE;
        }

        if (!is_numeric($stock)) {
            $f3->set("errorStock", "Stock number should only consist of numbers");
            $isValid = FALSE;
        } else if (strlen($stock) != 4) {
            // check if input is 4 numbers
            $f3->set("errorStock", "Stock number should be a 4-digit number");
            $isValid = FALSE;
        }
    } else {
        // no input for stock number
        $f3->set("errorStock", "Please enter a stock number");
        $isValid = FALSE;
    }

    // validates year
    if (!empty($_POST['year'])) {
        $year = $_POST['year'];
        if (!is_numeric($year)) {
            $f3->set("errorYear", "Only use numbers for year");
            $isValid = FALSE;
        } else if (strlen($year) != 4) {
            $f3->set("errorYear", "Year must be a 4-digit number");
            $isValid = FALSE;
        }
    } else {
        // no input for year
        $f3->set("errorYear", "Please enter a valid year");
        $isValid = FALSE;
    }

    // validates make
    if (!empty($_POST['make'])) {
        $make = $_POST['make'];
    } else {
        $f3->set("errorMake", "Enter make of the vehicle");
        $isValid = FALSE;
    }

    // validates model
    if (!empty($_POST['model'])) {
        $model = $_POST['model'];
    } else {
        $f3->set("errorModel", "Enter model of the vehicle");
        $isValid = FALSE;
    }

    // validates name
    if (!empty($_POST['name'])) {
        $updatedBy = $_POST['name'];
    } else {
        $f3->set("errorName", "Enter your name or department");
    }

    // if additional info is checked, check notes for input
    if (!empty($_POST['info'])) {
        // check if all additional fields are left empty
        if (empty($_POST['notes']) && empty($_POST['budget'])) {
            $f3->set("errorNotes", "'Notes' and 'Budget' cannot be empty if 
            'Additional Information' is checked");
            $isValid = false;
        } else if (!empty($_POST['notes'])) {
            // add notes if notes have input
            $notes = $_POST['notes'];
        } else if (!empty($_POST['budget'])) {
            // add budget if budget has input
            $budget = $_POST['budget'];
        }
    }

    if ($isValid) {
        if (isset($notes) && !isset($budget)) {
            // create an Child_AdditionalInfo object with budget as null
            $car = new Child_AdditionalInfo($stock, $make, $model, $year,
                "Inventoried", $updatedBy, $notes, NULL);
        } else if (isset($notes) && !isset($budget)) {
            // create an Child_AdditionalInfo object with notes as null
            $car = new Child_AdditionalInfo($stock, $make, $model, $year,
                "Inventoried", $updatedBy, NULL, $budget);
        } else if (isset($budget) && isset($notes)) {
            // create an Child_AdditionalInfo object with all parameters
            $car = new Child_AdditionalInfo($stock, $make, $model, $year,
                "Inventoried", $updatedBy, $notes, $budget);
        } else {
            // create a CarInfo object (default)
            $default = new Parent_CarInfo($stock, $make, $model, $year,
                "Inventoried", $updatedBy);

            // send to db
            $success = addDefaultInfo($default->getStock(), $default->getMake(),
                $default->getModel(), $default->getYear(), $default->getStatus(),
                $default->getUpdatedBy());
        }
        if (isset($car)) {
            // sends info to db for a car with additional info
            $success = addAdditionalInfo($car->getStock(), $car->getMake(),
                $car->getModel(), $car->getYear(), $car->getStatus(),
                $car->getUpdatedBy(), $car->getNotes(), $car->getBudget());
        }

        if ($success) {
            $f3->reroute("admin/add-success");

            // clear dupe stock number error msg
            $f3->set("errorStock", NULL);
        }
    }
}