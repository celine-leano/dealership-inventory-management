<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/18/2019
 * 328/final-project/model/admin/remove-car.php
 *
 * Removes a vehicle from the inventory
 */
global $f3;

// validates form when it is submitted
if (!empty($_POST)) {
    $success = removeCar($stockNum);

    if ($success) {
        $f3->reroute("admin/remove-success");
    }
}