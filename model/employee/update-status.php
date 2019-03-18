<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/13/2019
 * 328/final-project/model/employee/update-status.php
 * Creates an array of departments that the vehicle has yet to go through
 * and validates form
 */
global $f3;

// start index at 0
$index = 0;

// all departments
$statuses = ["Inventoried", "Inspection", "Service", "Paint", "Reconditioning",
    "Waiting For Parts", "Detail", "Photo Area", "Ready For Sale", "Sales",
    "Wash", "Sold"];

// loops over departments until we find the index for the car's current status
for ($i = 0; $i <= count($statuses); $i++) {
    if ($statuses[$i] == $car['status']) {
        $index = $i;
        break;
    }
}

// create a new array with the remaining departments, starting at our
// new index
$remainingDepartments = [];
for ($i = $index + 1; $i < count($statuses); $i++) {
    $remainingDepartments[] = $statuses[$i];
}
$f3->set("remaining", $remainingDepartments);

// validate form
$isValid = true;
$f3->set("errorUpdate", null);

if (!empty($_POST)) {
    // validate name / department field
    if (empty($_POST['employee'])) {
        $f3->set("errorUpdate", "Enter a name or department");
        $isValid = false;
    } else {
        $updatedBy = $_POST['employee'];
    }

    // validate drop-down
    if (empty($_POST['status']) || $_POST['status'] == '- Select -') {
        $f3->set("errorUpdate", "Select a status");
        $isValid = false;
    } else {
        $status = $_POST['status'];
    }

    // if additional info is checked, check notes for input
    if (!empty($_POST['info'])) {
        if (empty($_POST['notes'])) {
            $f3->set("errorUpdate", "'Notes' cannot be empty if 'Additional 
            Information' is checked");
            $isValid = false;
        } else {
            $notes = $_POST['notes'];
        }
    }

    if ($isValid) {
        // create an object (CarInfo or AdditionalInfo)
        $stockNum = $car['stock'];
        $year = $car['year'];
        $make = $car['make'];
        $model = $car['model'];
        $budget = null;

        if (!empty($_POST['notes'])) {
            // create an AdditionalInfo object
            $car = new Child_AdditionalInfo($stockNum, $make, $model, $year,
                $status, $updatedBy, $notes, $budget);

            //insert into database
            $success = addAdditionalInfo($car->getStock(), $car->getMake(),
                $car->getModel(), $car->getYear(), $car->getStatus(),
                $car->getUpdatedBy(), $car->getNotes(), $car->getBudget());
        } else {
            // create a CarInfo object
            $car = new Parent_CarInfo($stockNum, $make, $model, $year, $status,
                $updatedBy);

            // insert into database
            $success = addDefaultInfo($car->getStock(), $car->getMake(),
                $car->getModel(), $car->getYear(), $car->getStatus(),
                $car->getUpdatedBy());
        }

        if ($success) {
            $_SESSION['stock'] = $success;
            $f3->reroute("employee/updated");
        }
    }
}