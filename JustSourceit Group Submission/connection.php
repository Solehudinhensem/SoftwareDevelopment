<?php

$servername = "fdb1032.awardspace.net";
$dbport = 3306;
$dbuser = "4456997_ucop";
$dbpass = "S*leh1042004";
$dbname = "4456997_ucop";

// Establish connection
if (!$con = mysqli_connect($servername, $dbuser, $dbpass, $dbname, $dbport)) {
    die("Failed to connect: " . mysqli_connect_error());
}


?>