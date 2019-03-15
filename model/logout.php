<?php
/**
 * Celine Leano and Adolfo Gonzalez
 * 2/10/2019
 * 328/final-project/model/logout.php
 * Fat-Free Routing
 */
//kill session on log out
session_unset();
session_destroy();
