<?php
include_once 'includes/dbh.inc.php';

$sql = "INSERT INTO Bikes (status, price, rim, gears, brake) VALUES ('available', '300', '2', '1', '1');";
mysqli_query($conn, $sql);
?>