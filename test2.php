<?php
$conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E');

$sql = "INSERT INTO test (first, last, password) VALUES ('Emil', 'Wibergh', 'Stolt');";
mysqli_query($conn, $sql);
?>