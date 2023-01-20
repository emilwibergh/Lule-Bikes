<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $conn= mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E') or die("Connection Failed:" .mysqli_connect_error());
        if(isset($_POST['price']) && isset($_POST['rim']) && isset($_POST['gears']) && isset($_POST['brake']) && isset($_POST['available'])) {

            $price = $_POST['price'];
            $rim = $_POST['rim'];
            $gears = $_POST['gears'];
            $brake = $_POST['brake'];
            $available = $_POST['available'];

            $sql = "INSERT INTO `Bikes` (`price`, `rim`, `gears`, `brake`, `available`) VALUES ('$price', '$rim','$gears', '$brake', '$available')";

            $query = mysqli_query($conn, $sql);
            if($query) {
                echo 'Entry Successful';
            }
            else{
                echo 'Error Occurred';
            }
        }
    }
?>