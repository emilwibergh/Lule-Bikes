<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');

$id = $_POST['id'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$pickupPoint = $_POST['pickupPoint'];
$returnPoint = $_POST['returnPoint'];
$bookedBy = $_POST['bookedBy'];
$returned = 0;

$sql = "INSERT INTO bookings (startDate, endDate, pickupPoint, returnPoint, bookedBy, returned) 
        VALUES ('$startDate', '$endDate', '$pickupPoint', '$returnPoint', '$bookedBy', '$returned')";
mysqli_query($conn, $sql);
?>