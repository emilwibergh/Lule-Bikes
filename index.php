<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Luleå Bikes</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	</head>
	<body>

		<div class="main">
			<div class="navbar">Luleå Bikes</div>
			<div class="avbikes">
			<?php
			$sql = 'SELECT * FROM Bikes WHERE status="available";';
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			while ($row = mysqli_fetch_assoc($result)) {

				echo '<div class="bikeAd" style="background-image: url(BikeAdImages/001.jpg);">';
					echo '<div class="bikeAdID">#'. $row['id'] .'</div>';
					echo '<div class="bikeAdBar"> </div>';
					echo '<div class="bikeAdPrice">'. $row['price'] .' kr</div>';
					echo '<div class="bikeAdButton">Rent</div>';
				echo '</div>';
					
			}
			?>
			</div>
		</div>
	</body>
</html>