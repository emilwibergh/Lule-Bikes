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

    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];
    $bike_id = $_POST["bike_id"];

    $sql = "INSERT INTO comments (username, comment, rating, bike_id, date)
            VALUES ( '$name', '$comment', '$rating','$bike_id', now() )";


    if ($conn->query($sql) === TRUE) {
        echo "<p>Your comment has been submitted.</p>";
        header('Location: bookbike.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }




// Close the database connection
$conn->close();
?>