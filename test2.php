<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');

$sql = "SELECT * FROM Bikes";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
	while ($row = mysqli_fetch_assoc($result)) {

		echo $row['price'];
					
	}
}
?>