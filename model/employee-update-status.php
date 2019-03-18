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
    $statuses = ["Inventoried", "Inspection", "Service", "Paint", "Reconditioning", "Waiting For Parts", "Detail",
            "Photo Area", "Ready For Sale", "Sales", "Wash", "Sold"];
    for($i = 0;$i <= count($statuses);$i ++)
    {
        if($statuses[$i] == $stock['status'])
        {
            $index = $i;
            break;
        }
    }
    $remainingDepartments = [];
    for($i = $index + 1;$i < count($statuses);$i ++)
    {
        $remainingDepartments[] = $statuses[$i];
    }
    $f3 -> set("remaining", $remainingDepartments);

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
            // save status in a variable
            $status = $_POST['status'];
        }

        // if additional info is checked, check notes for input
        if (!empty($_POST['info'])) {
            if (empty($_POST['notes'])) {
                $f3->set("errorUpdate", "'Notes' cannot be empty if 'Additional Information' is checked");
                $isValid = false;
            } else {
                $notes = $_POST['notes'];
            }
        }

        if ($isValid) {
            // create an object (CarInfo or AdditionalInfo)
            $stockNum = $stock['stock'];
            $year = $stock['year'];
            $make = $stock['make'];
            $model = $stock['model'];
            $budget = null;

            if (!empty($_POST['notes'])) {
                // create an AdditionalInfo object
                $car = new AdditionalInfo($stockNum,$make,$model,$year,$status,$updatedBy,$notes,$budget);

                //insert into database
                $success = addAdditionalInfo($car->getStock(), $car->getMake(), $car->getModel(),
                    $car->getYear(), $car->getStatus(), $car->getUpdatedBy(), $car->getNotes(), $car->getBudget());
            } else {
                // create a CarInfo object
                $car = new CarInfo($stockNum,$make,$model,$year,$status,$updatedBy);

                // insert into database
                $success = addDefaultInfo($car->getStock(), $car->getMake(), $car->getModel(),
                    $car->getYear(), $car->getStatus(), $car->getUpdatedBy());
            }

            if ($success) {
                $_SESSION['stock'] = $success;
                $f3->reroute("employee/updated");
            }
        }
    }