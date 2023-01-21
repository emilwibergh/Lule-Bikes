<?php
$mysqli = new mysqli('localhost', 'D0018E', 'D0018E', 'test');

$first = $_POST['first'];
$last = $_POST['last'];
$pass = $_POST['pass'];

$sql = "INSERT INTO users (first, last, pass) VALUES ($first, $last, $pass);";
mysqli_query($conn, $sql);

header("Location: test.php?signup=success");
?>