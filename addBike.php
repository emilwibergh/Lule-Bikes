<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');

$status = $_POST['status'];
$price = $_POST['price'];
$rim = $_POST['rim'];
$gears = $_POST['gears'];
$brake = $_POST['brake'];

$sql = "INSERT INTO Bikes (status, price, rim, gears, brake) VALUES ('$status', '$price', '$rim', '$gears', '$brake')";
mysqli_query($conn, $sql);
?>