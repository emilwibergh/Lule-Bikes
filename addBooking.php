<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');

$id = $_POST['id'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$pickupPoint = $_POST['pickupPoint'];
$returnPoint = $_POST['returnPoint'];
$bookedBy = $_POST['bookedBy'];
$bikeBooked = $_POST['bikeBooked'];
$returned = $_POST['returned'];

// check if bike is still available
$sql = "SELECT 1 FROM products where id = $id AND status='available'";
$result = mysqli_query($conn, $sql);
if ($result = mysqli_num_rows($result) == 0) {
    // change bike availability to booked
    $sql = "UPDATE Bikes SET status='booked' WHERE id=$id";
    mysqli_query($conn, $sql);

    // insert booking to bookings database
    $sql = "INSERT INTO bookings (startDate, endDate, pickupPoint, returnPoint, bookedBy, bikeBooked, returned) VALUES ('$startDate', '$endDate', '$pickupPoint', '$returnPoint', '$bookedBy', '$bikeBooked', '$returned')";
    mysqli_query($conn, $sql);

    header("Location: index.php?booking=success");
} else {
    header("Location: index.php?booking=failed");
}
?>