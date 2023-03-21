<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$conn = mysqli_connect('localhost', 'root', 'Password123#@!', 'Bike_databas');

if(isset($_POST['logout'])) {
	session_unset();
	session_destroy();
	header("Location: index.php");
}

if(isset($_POST['price'])) {

    $id = $_POST['id'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $rim = $_POST['rim'];
    $gears = $_POST['gears'];
    $brake = $_POST['brake'];

    // Prepare the query
    $sql = "UPDATE Bikes SET status='$status', price='$price', rim='$rim', gears='$gears', brake='$brake' WHERE id='$id'";

    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Admin</title>
	<link rel="stylesheet" href="dashboard.css">
</head>
<body>
	<header>
		<h1>Bike Booking Dashboard</h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Bikes</a></li>
				<li><a href="#">Bookings</a></li>
				<li><a href="#">Customers</a></li>
				<li><a href="#">Settings</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<table class="bikes-table">
            <tr>
                <th class="bikes-id">ID</th>
                <th class="bikes-status">Status</th>
                <th class="bikes-price">Price</th>
                <th class="bikes-rim">Rim</th>
                <th class="bikes-gears">Gears</th>
                <th class="bikes-brake">Brakes</th>
                <th class="bikes-edit">Edit</th>
            </tr>

            <?php
			$sql = 'SELECT * FROM Bikes;';
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo    '<form action = "dashboard.php" method ="POST">';
                echo    '<td><input class="bikes-id-input" name="id" value="'. $row['id'] .'" readonly></input></td>';
                echo    '<td><input class="bikes-status-input" name="status" value="'. $row['status'] .'"></input></td>';
                echo    '<td><input class="bikes-price-input" name="price" value="'. $row['price'] .'"></input></td>';
                echo    '<td><input class="bikes-rim-input" name="rim" value="'.$row['rim'].'"></input></td>';
                echo    '<td><input class="bikes-gears-input" name="gears" value="'.$row['gears'].'"></input></td>';
                echo    '<td><input class="bikes-brake-input" name="brake" value="'.$row['brake'].'"></input></td>';
                echo    '<td><button type="submit" name="submit">Edit</button></td>';
                echo    '</form>';
                echo '</tr>';
            }
            ?>
        </table>
	</main>
	<footer>
		<p>&copy; 2023 Bike Booking Company. All rights reserved.</p>
	</footer>
</body>
</html>
