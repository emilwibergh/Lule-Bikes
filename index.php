<?php
session_start();
$conn = mysqli_connect('localhost', 'root', 'Password123#@!', 'Bike_databas');

if(isset($_POST['logout'])) {
	session_unset();
	session_destroy();
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Luleå Bikes</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<style>
		<?php 
		if ($_GET['booking'] == "success") {
			echo ".bookSuccess {display: block;}";
		}
		; ?> </style>

	</head>
	<body>
<?php
	if (!isset($_SESSION['username'])) {
    echo '<button class="login-button" onclick="window.location.href = \'login/login.html\';">Login</button>';
	echo '<button class="register-button" onclick="window.location.href = \'registration/register.html\';">Register</button>';
	}
	if (isset($_SESSION['username'])) {
			echo '<form method="post">
				  <button class="login-button" type="submit" name="logout">Logout</button>
		  		  </form>';
			echo '<button class="register-button" onclick="window.location.href = \'dashboard.php\';">' . $_SESSION["username"] . '</button>';
		}
?>
		<div class="navbar">Luleå Bikes</div>
		<div class="main">
			<div class="bookSuccess">Your booking was Successful!</div>
			<div class="avbikes">
			<?php
			$sql = 'SELECT * FROM Bikes WHERE status="vacant";';
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			while ($row = mysqli_fetch_assoc($result)) {

				echo '<div class="bikeAd" style="background-image: url(BikeAdImages/001.jpg);">';
					echo '<div class="bikeAdID">#'. $row['id'] .'</div>';
					echo '<div class="bikeAdBar"> </div>';
					echo '<div class="bikeAdPrice">'. $row['price'] .' kr</div>';

				echo '<form action = "bookbike.php" method ="POST">';
				echo '<input type="hidden" name="id"  value="' . $row['id'] . '" readonly/>';
				if (isset($_SESSION['username'])) {
					echo '<button type="submit" name="submit" class="bikeAdButton">Rent</button>';
				}
				echo '</form>';
				echo '</div>';
					
			}
			?>
			</div>
		</div>


	</body>
</html>
