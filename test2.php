<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');

$sql = "INSERT INTO Bikes (status, price, rim, gears, brake) VALUES ('available', '300', '2', '1', '1');";
mysqli_query($conn, $sql);


$sql = "SELECT * FROM Bikes";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
echo $resultcheck;

	while ($row = mysqli_fetch_assoc($result)) {

		echo $row['price'];
					
	}
?>