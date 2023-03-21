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
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Luleå Bikes</title>
		<link rel="stylesheet" href="bookbike.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	</head>
	<body>
  <?php
	if (!isset($_SESSION['username'])) {
    echo '<button class="login-button" onclick="window.location.href = \'login/login.html\';">Login</button>';
	echo '<button class="register-button" onclick="window.location.href = \'registration/register.html\';">Register</button>';
	}
	if (isset($_SESSION['username'])) {
			echo $_SESSION['username'];
			echo '<form method="post">
				  <button type="submit" name="logout">Logout</button>
		  		  </form>';
		}
?>

		<div class="navbar">Luleå Bikes
      <form action="index.php" method="POST">
				  <button type="submit">Go Back</button>
		  	</form></div>
		<div class="mainform">
            <br><br>
            <h1>Booking of Bike #<?php echo $_POST['id']?></h1>
            <form action = 'checkout/addToCart.php' method ="POST">

                <input type="hidden" name="bikeid"  value="<?php echo $_POST['id']?>" readonly required/>   <br> <br>
                
                <label for="submit">Full Name</label>
                <input type="text" name="username" value="<?php echo $_SESSION['username']?> " readonly required/>  <br> <br>
            
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

                

                <button type="submit" name="addToCart">Book Bike</button>
            </form>

            <br><br>
            <h2>Comments:</h2>
            <?php

// Get comments from database
$bike_id = $_POST['id'];
$sql = "SELECT * FROM comments WHERE bike_id = '$bike_id' ";
$result = $conn->query($sql);


// Display comments
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='comment'>";
        echo "<p><strong>" . $row["username"] . ":</strong></p>";
        echo "<p>" . $row["date"] . "</p>";
        echo "<p>" . $row["comment"] . "</p>";
        echo "<p>Rating: " . $row["rating"] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No comments yet.</p>";
}
?>

<h2>Leave a Comment on Bike: "<?php echo $bike_id?>" </h2>
<form action = 'comments/registration/comments.php' method ="POST">

    <input type="hidden" name="bike_id" value="<?php echo $_POST['id']; ?>">
    <input type="text" name="name" value="<?php echo $_SESSION['username'] ?>" readonly><br>
    <label>Comment:</label><br>
    <textarea name="comment"></textarea><br>
    <label>Rating:</label><br>
    <input type="number" name="rating" min="1" max="5"><br>
    <input type="submit" value="Submit">
</form>

		</div>
	</body>
</html>