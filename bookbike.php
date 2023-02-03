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
		<div class="navbar">Luleå Bikes</div>
		<div class="main">
            <form action = 'addBooking.php' method ="POST">

                <input type="text" name="id"  value="<?php echo $_POST['id']?>" readonly/> <br> <br>

                <input type="text" name="startDate"  placeholder="Start Date"/> <br> <br>

                <input type="text" name="endDate" placeholder="End Date"/> <br> <br>

                <input type="text" name="pickupPoint"  placeholder="Pickup Point"/> <br> <br>

                <input type="text" name="returnPoint"  placeholder="Return Point"/> <br> <br>

                <input type="text" name="bookedBy"  placeholder="Booked By"/> <br> <br>

                <input type="text" name="bikeBooked"  placeholder="Bike Booked"/> <br> <br>

                <input type="text" name="returned"  placeholder="Returned"/> <br> <br>

                <button type="submit" name="submit">Book Bike</button>
            </form>
		</div>
	</body>
</html>