<?php
$conn = mysqli_connect("lulea-bikes", "root", "Password123#@!");
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
		<div class="mainform">
            <br><br>
            <h1>Booking of Bike #<?php echo $_POST['id']?></h1>
            <form action = 'addBooking.php' method ="POST">

                <input type="hidden" name="id"  value="<?php echo $_POST['id']?>" readonly required/> <br> <br>
                
                <label for="submit">Full Name</label>
                <input type="text" name="bookedBy"  placeholder="Full Name" required/> <br> <br>

                <label for="submit">Start Date</label>
                <input type="date" name="startDate" value="2023-02-03" min="2023-02-03" max="2024-02-02" placeholder="Start Date" required/> <br> <br>

                <label for="submit">End Date</label>
                <input type="date" name="endDate" value="2023-02-04" min="2023-02-04" max="2024-02-02" placeholder="End Date" required/> <br> <br>

                <label for="submit">Pickup Point</label> <select name="pickupPoint"> <br>
                <option value="University">University</option>
                    <option value="Center">Center</option>
                    <option value="Professorsvägen">Professorsvägen</option>
                    <option value="Väderleden">Väderleden</option>
                </select> <br> <br>

                <label for="submit">Pickup Point</label> <select name="returnPoint">
                    <option value="University">University</option>
                    <option value="Center">Center</option>
                    <option value="Professorsvägen">Professorsvägen</option>
                    <option value="Väderleden">Väderleden</option>
                </select> <br> <br>

                <input type="hidden" name="returned"  placeholder="Returned" value="0" readonly required/>

                <button type="submit" name="submit">Book Bike</button>
            </form>
		</div>
	</body>
</html>