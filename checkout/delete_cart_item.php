<?php
session_start();

ini_set('display_errors', 1);
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
$itemid = $_POST['itemid'];
// Construct the SQL query to delete the cart item
$sql = "DELETE FROM cart WHERE id = $itemid  ";


error_reporting(E_ALL);

// Execute the query and check for errors
if (mysqli_query($conn, $sql)) {
    echo "Cart item deleted successfully.";
} else {
    echo "Error deleting cart item: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>