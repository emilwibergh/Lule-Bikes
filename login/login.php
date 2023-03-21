<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit;
}

$host = "localhost";
$username = "root";
$password = "Password123#@!";
$dbname = "Bike_databas";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT password FROM accounts WHERE username = ?";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) < 1) {
        exit('No username with that name found!');
    } else {
        mysqli_stmt_bind_result($stmt, $hashed_password);
        mysqli_stmt_fetch($stmt);
        if (password_verify($password, $hashed_password)) {
            // Passwords match
            $_SESSION['username'] = $username;
            header('Location: ../index.php');
            exit;

        } else {
            // Passwords do not match
            exit('Incorrect password!');
        }
    }
    mysqli_stmt_close($stmt);
} else {
    exit('Could not prepare statement: ' . mysqli_error($conn));
    echo "3";
}

if (!$conn) {
    die( " Connection failed: " . mysqli_connect_error ());
}
// echo " Connected successfully" ;
?>
  
