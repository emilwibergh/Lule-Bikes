<?php
    session_start();
    // Define database connection variables
    $servername = "localhost";
    $username = "root";
    $password = "Password123#@!";
    $dbname = "Bike_databas";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



$username = $_SESSION['username'];
$userid_query = "SELECT id FROM accounts WHERE username = '$username'";
$userid_result = mysqli_query($conn, $userid_query);
$userid_row = mysqli_fetch_assoc($userid_result);
$userid = $userid_row['id'];

// Get form data

$bikeid = $_POST['bikeid'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$pickupPoint = $_POST['pickupPoint'];
$returnPoint = $_POST['returnPoint'];
$returned = $_POST['returned'];

if (mysqli_num_rows($userid_result) == 0) {
    die("User ID not found");
}

$sql = "INSERT INTO cart (userid, bikeid, startDate, endDate, pickupPoint, returnPoint, returned)
        VALUES ( '$userid', '$bikeid',  '$startDate', '$endDate', '$pickupPoint', '$returnPoint', '$returned')";


if ($conn->query($sql) === TRUE) {
    echo "<p>Your bike has been added.</p>";
    header('Location: bookbike.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




// Close the database connection
$conn->close();
?>
