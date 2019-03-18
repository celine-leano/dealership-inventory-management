<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 3/17/2019
 * model/check-for-login.php
 * Prevents users from accessing pages without logging in first
 */

// prevents users from accessing page without logging in first
if (empty($_SESSION['user'])) {
    header('Location: http://cleano.greenriverdev.com/328/final-project');
    exit;
} else {
    $user = $_SESSION['user'];
}