<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');

$sql = "INSERT INTO Bikes (status, price, rim, gears, brake) VALUES ('available', '300', '2', '1', '1');";
mysqli_query($conn, $sql);
?>