<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');

$id = $_POST['id'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$pickupPoint = $_POST['pickupPoint'];
$returnPoint = $_POST['returnPoint'];
$bookedBy = $_POST['bookedBy'];
$bikeBooked = $_POST['bikeBooked'];
$returned = $_POST['returned'];

$sql = "UPDATE Bikes SET status='Booked' WHERE id=$id";
mysqli_query($conn, $sql);

$sql = "INSERT INTO bookings (startDate, endDate, pickupPoint, returnPoint, bookedBy, bikeBooked, returned) VALUES ('$startDate', '$endDate', '$pickupPoint', '$returnPoint', '$bookedBy', '$bikeBooked', '$returned')";
mysqli_query($conn, $sql);

header("Location: index.php?booking=success");
?>