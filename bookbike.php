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
            <h1>Booking of Bike #<?php echo $_POST['id']?></h1>
            <form action = 'addBooking.php' method ="POST">

                <input type="hidden" name="id"  value="<?php echo $_POST['id']?>" readonly required/> <br> <br>

                <input type="text" name="startDate"  placeholder="Start Date" required/> <br> <br>

                <input type="text" name="endDate" placeholder="End Date" required/> <br> <br>

                <input type="text" name="pickupPoint"  placeholder="Pickup Point" required/> <br> <br>

                <input type="text" name="returnPoint"  placeholder="Return Point" required/> <br> <br>

                <input type="text" name="bookedBy"  placeholder="Booked By" required/> <br> <br>

                <input type="text" name="bikeBooked"  placeholder="Bike Booked" required/> <br> <br>

                <input type="text" name="returned"  placeholder="Returned" required/> <br> <br>

                <button type="submit" name="submit">Book Bike</button>
            </form>
		</div>
	</body>
</html>