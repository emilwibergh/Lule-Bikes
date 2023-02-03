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
			<div class="avbikes">
			<?php

			$sql = "INSERT INTO Bikes (status, price, rim, gears, brake) VALUES ('available', '300', '2', '1', '1');";
			mysqli_query($conn, $sql);

			$sql = 'SELECT * FROM bikes WHERE status="available";';
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

					echo '<div class="bikeAd" style="background-image: url(BikeAdImages/001.jpg);">';
					echo '<div class="bikeAdID">#'+$row['id']+'</div>';
					echo '<div class="bikeAdBar"> </div>';
					echo '<div class="bikeAdPrice">500 kr</div>';
					echo '<div class="bikeAdButton">Rent</div>';
				echo '</div>';
					
				}
			}

				echo '<div class="bikeAd" style="background-image: url(BikeAdImages/001.jpg);">';
					echo '<div class="bikeAdID">#235</div>';
					echo '<div class="bikeAdBar"> </div>';
					echo '<div class="bikeAdPrice">500 kr</div>';
					echo '<div class="bikeAdButton">Rent</div>';
				echo '</div>';
			?>
				<div class="bikeAd" style="background-image: url(BikeAdImages/001.jpg);">
					<div class="bikeAdID">#001</div>
					<div class="bikeAdBar"> </div>
					<div class="bikeAdPrice">500 kr</div>
					<div class="bikeAdButton">Rent</div>
				</div>
				<div class="bikeAd" style="background-image: url(BikeAdImages/002.png);">
					<div class="bikeAdID">#001</div>
					<div class="bikeAdBar"> </div>
					<div class="bikeAdPrice">500 kr</div>
					<div class="bikeAdButton">Rent</div>
				</div>
				<div class="bikeAd" style="background-image: url(BikeAdImages/001.jpg);">
					<div class="bikeAdID">#001</div>
					<div class="bikeAdBar"> </div>
					<div class="bikeAdPrice">500 kr</div>
					<div class="bikeAdButton">Rent</div>
				</div>
				<div class="bikeAd" style="background-image: url(BikeAdImages/001.jpg);">
					<div class="bikeAdID">#001</div>
					<div class="bikeAdBar"> </div>
					<div class="bikeAdPrice">500 kr</div>
					<div class="bikeAdButton">Rent</div>
				</div>
				<div class="bikeAd" style="background-image: url(BikeAdImages/002.png);">
					<div class="bikeAdID">#001</div>
					<div class="bikeAdBar"> </div>
					<div class="bikeAdPrice">500 kr</div>
					<div class="bikeAdButton">Rent</div>
				</div>
				<div class="bikeAd" style="background-image: url(BikeAdImages/001.jpg);">
					<div class="bikeAdID">#001</div>
					<div class="bikeAdBar"> </div>
					<div class="bikeAdPrice">500 kr</div>
					<div class="bikeAdButton">Rent</div>
				</div>
				<div class="bikeAd" style="background-image: url(BikeAdImages/001.jpg);">
					<div class="bikeAdID">#001</div>
					<div class="bikeAdBar"> </div>
					<div class="bikeAdPrice">500 kr</div>
					<div class="bikeAdButton">Rent</div>
				</div>
				<div class="bikeAd" style="background-image: url(BikeAdImages/002.png);">
					<div class="bikeAdID">#001</div>
					<div class="bikeAdBar"> </div>
					<div class="bikeAdPrice">500 kr</div>
					<div class="bikeAdButton">Rent</div>
				</div>
			</div>
		</div>
	</body>
</html>