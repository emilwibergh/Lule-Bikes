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

                <input type="text" name="bookedBy"  placeholder="Full Name" required/> <br> <br>

                <input type="date" name="startDate" value="2023-02-03" min="2023-02-03" max="2024-02-02" placeholder="Start Date" required/> <br> <br>

                <input type="date" name="endDate" value="2023-02-04" min="2023-02-04" max="2024-02-02" placeholder="End Date" required/> <br> <br>

                <input type="text" name="pickupPoint"  placeholder="Pickup Point" required/> <br> <br>
                <label for="submit"></label> <select name="pickupPoint"> <option value="University">University</option>
                    <option value="University">University</option>
                    <option value="University">Center</option>
                    <option value="University">Professorsvagen</option>
                    <option value="University">Vaderleden</option>
                </select>

                <input type="text" name="returnPoint"  placeholder="Return Point" required/> <br> <br>

                <input type="date" name="bikeBooked"  placeholder="Bike Booked" value="2023-02-02" readonly required/> <br> <br>

                <input type="hidden" name="returned"  placeholder="Returned" value="0" readonly required/> <br> <br>

                <button type="submit" name="submit">Book Bike</button>
            </form>
		</div>
	</body>
</html>