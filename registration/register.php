<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Password123#@!";
$dbname = "Bike_databas";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate input
    if (empty($username) || empty($email) || empty($phone) || empty($password)) {
        exit('Please complete the registration form');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit('Please enter a valid email address');
    }

    // Check if the account with that username or email exists
    $query = "SELECT id FROM accounts WHERE username = ? OR email = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            // Username or email already exists
            exit('Username or email already exists, please choose another!');
        }
        mysqli_stmt_close($stmt);
    } else {
        // Could not prepare statement
        exit('Could not prepare statement: ' . mysqli_error($conn));
    }

    // Insert new account
    $query = "INSERT INTO accounts (username, email, phone, password) VALUES (?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $query)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        mysqli_stmt_bind_param($stmt, 'ssss', $username, $email, $phone, $hashed_password);
        mysqli_stmt_execute($stmt);
        echo 'You have successfully registered! You can now login!';
        mysqli_stmt_close($stmt);
    } else {
        // Could not prepare statement
        exit('Could not prepare statement: ' . mysqli_error($conn));
    }
}

mysqli_close($conn);

?>
