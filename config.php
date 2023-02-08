<?php
$host = "localhost";
$username = "root";
$password = "pwd";
$db = "namn" ;

//create connection
$conn = new mysqli($host, $username, $password, $db);

//checkar om den är connected

if (!$conn) {
    die( " Connection failed: " . mysqli_connect_error ());
}
// echo " Connected successfully" ;

?>
