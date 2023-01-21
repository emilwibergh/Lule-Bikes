<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'test');

$first = $_POST['first'];
$last = $_POST['last'];
$pass = $_POST['pass'];

$sql = "INSERT INTO users (first, last, pass) VALUES ('Emil', 'Wibergh', 'Stolt');";
mysqli_query($conn, $sql);

#header("Location: test.php?signup=success");
?>