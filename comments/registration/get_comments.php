<?php

// Set up database connection
$servername = "localhost";
$username = "root";
$password = "Password123#@!";
$dbname = "Bike_databas";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get bike ID from URL parameter
if (isset($_GET['bike_id'])) {
    $bike_id = $_GET['bike_id'];
} else {
    $bike_id = 0; // default value
}

// Prepare and execute SQL query
$stmt = $conn->prepare("SELECT comment FROM comments WHERE bike_id = ?");
$stmt->bind_param("i", $bike_id);
$stmt->execute();
$result = $stmt->get_result();

// Display comments in HTML
echo "<h2>Comments:</h2>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row["comment"] . "</li>";
}
echo "</ul>";

// Close database connection
$stmt->close();
$conn->close();

?>