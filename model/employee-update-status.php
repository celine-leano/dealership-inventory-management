<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/13/2019
 * 328/final-project/model/employee-update-status.php
 * Creates an array of departments that the vehicle has yet to go through
 * and validates form
 */

global $f3;

// remaining departments
$index = 0;
$statuses = array("Inventoried", "Inspection", "Service", "Paint",
    "Reconditioning", "Waiting For Parts", "Detail", "Photo Area", "Ready For Sale",
    "Sales", "Wash", "Sold");
for ($i = 0; $i <= count($statuses); $i++) {
    if ($statuses[$i] == $stock['status']) {
        $index = $i;
        break;
    }
}

$remainingDepartments = array();
for ($i = $index + 1; $i < count($statuses); $i++) {
    $remainingDepartments[] = $statuses[$i];
}

$f3->set("remaining", $remainingDepartments);