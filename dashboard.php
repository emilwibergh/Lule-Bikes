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

if($_POST['typeOfRequest'] == "updateBike") {

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

if($_POST['typeOfRequest'] == "updateAccount") {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $activation_code = $_POST['activation_code'];

    // Prepare the query
    $sql = "UPDATE accounts SET username='$username', password='$password', email='$email', phone='$phone', activation_code='$activation_code' WHERE id='$id'";

    mysqli_query($conn, $sql);
}
if($_POST['typeOfRequest'] == "deleteAccount") {

    $id = $_POST['id'];

    $sql = "DELETE FROM accounts WHERE id='$id';";

    mysqli_query($conn, $sql);
}


if($_POST['typeOfRequest'] == "updateBookings") {

    $bookingId = $_POST['bookingId'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $pickupPoint = $_POST['pickupPoint'];
    $returnPoint = $_POST['returnPoint'];
    $bookedBy = $_POST['bookedBy'];
    $bikeBooked = $_POST['bikeBooked'];
    $returned = $_POST['returned'];

    // Prepare the query
    $sql = "UPDATE accounts SET startDate='$startDate', endDate='$endDate', pickupPoint='$pickupPoint', returnPoint='$returnPoint', bookedBy='$bookedBy', bikeBooked='$bikeBooked', returned='$returned' WHERE bookingId='$bookingId'";

    mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
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
<div class="navbar">Dashboard</div>
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
                echo    '<input class="bikes-id-input" name="typeOfRequest" type="hidden" value="updateBike" readonly></input>';
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
        <table class="bikes-table">
            <tr>
                <th class="bikes-id">ID</th>
                <th class="bikes-username">username</th>
                <th class="bikes-phone">password</th>
                <th class="bikes-email">email</th>
                <th class="bikes-phone">phone</th>
                <th class="bikes-phone">activation_code</th>
                <th class="bikes-edit">Edit</th>
                <th class="bikes-edit">Delete</th>
            </tr>

            <?php
			$sql = 'SELECT * FROM accounts;';
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo    '<form action = "dashboard.php" method ="POST">';
                echo    '<input class="bikes-id-input" name="typeOfRequest" type="hidden" value="updateAccount" readonly></input>';
                echo    '<td><input class="bikes-id-input" name="id" value="'. $row['id'] .'" readonly></input></td>';
                echo    '<td><input class="bikes-username-input" name="username" value="'. $row['username'] .'"></input></td>';
                echo    '<td><input class="bikes-email-input" name="password" value="'.$row['password'].'"></input></td>';
                echo    '<td><input class="bikes-email-input" name="email" value="'.$row['email'].'"></input></td>';
                echo    '<td><input class="bikes-phone-input" name="phone" value="'.$row['phone'].'"></input></td>';
                echo    '<td><input class="bikes-email-input" name="activation_code" value="'.$row['activation_code'].'"></input></td>';
                echo    '<td><button type="submit" name="submit">Edit</button></td>';
                echo    '</form>';
                echo    '<form action = "dashboard.php" method ="POST">';
                echo    '<input class="bikes-id-input" name="typeOfRequest" type="hidden" value="deleteAccount" readonly></input>';
                echo    '<input class="bikes-id-input" name="id" type="hidden" value="'. $row['id'] .'" readonly></input>';
                echo    '<td><button type="submit" name="submit">Delete</button></td>';
                echo    '</form>';
                echo '</tr>';
            }
            ?>
        </table>
        <table class="bikes-table">
            <tr>
                <th class="bikes-id">ID</th>
                <th class="bikes-username">startDate</th>
                <th class="bikes-phone">endfDate</th>
                <th class="bikes-email">pickupPoint</th>
                <th class="bikes-phone">returnPoint</th>
                <th class="bikes-phone">bookedBy</th>
                <th class="bikes-bikeBooked">bikeBooked</th>
                <th class="bikes-returned">returned</th>
                <th class="bikes-edit">Edit</th>
                <th class="bikes-edit">Delete</th>
            </tr>

            <?php
			$sql = 'SELECT * FROM bookings;';
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo    '<form action = "dashboard.php" method ="POST">';
                echo    '<input class="bikes-id-input" name="typeOfRequest" type="hidden" value="updateBookings" readonly></input>';
                echo    '<td><input class="bikes-id-input" name="id" value="'. $row['bookingId'] .'" readonly></input></td>';
                echo    '<td><input class="bikes-startDate-input" name="startDate" value="'. $row['startDate'] .'"></input></td>';
                echo    '<td><input class="bikes-email-input" name="endDate" value="'.$row['endDate'].'"></input></td>';
                echo    '<td><input class="bikes-email-input" name="pickupPoint" value="'.$row['pickupPoint'].'"></input></td>';
                echo    '<td><input class="bikes-phone-input" name="returnPoint" value="'.$row['returnPoint'].'"></input></td>';
                echo    '<td><input class="bikes-email-input" name="bookedBy" value="'.$row['bookedBy'].'"></input></td>';
                echo    '<td><input class="bikes-email-input" name="bikeBooked" value="'.$row['bikeBooked'].'"></input></td>';
                echo    '<td><input class="bikes-email-input" name="returned" value="'.$row['returned'].'"></input></td>';
                echo    '<td><button type="submit" name="submit">Edit</button></td>';
                echo    '</form>';
                echo    '<form action = "dashboard.php" method ="POST">';
                echo    '<input class="bikes-id-input" name="typeOfRequest" type="hidden" value="deleteBooking" readonly></input>';
                echo    '<input class="bikes-id-input" name="id" type="hidden" value="'. $row['bookingId'] .'" readonly></input>';
                echo    '<td><button type="submit" name="submit">Delete</button></td>';
                echo    '</form>';
                echo '</tr>';
            }
            ?>
        </table>
        
	</main>
</body>
</html>
