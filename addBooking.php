<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');

$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$pickupPoint = $_POST['pickupPoint'];
$returnPoint = $_POST['returnPoint'];
$bookedBy = $_POST['bookedBy'];
$bikeBooked = $_POST['bikeBooked'];
$returned = $_POST['returned'];

$sql = "INSERT INTO bookings (startDate, endDate, pickupPoint, returnPoint, bookedBy, bikeBooked, returned) VALUES ('yo', 'yo', 'yo', 'yo', 'yo', 'yo', 'yo')";
mysqli_query($conn, $sql);
?>