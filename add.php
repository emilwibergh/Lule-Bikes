<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $conn = mysqli_connect('localhost', 'D0018E', 'D0018E', 'D0018E') or die("Connection Failed:" .mysqli_connect_error());
        if(isset(isset($_POST['price']) && isset($_POST['rim']) && isset($_POST['gears']) && isset($_POST['brake']) && isset($_POST['available']))) {
            $name = $_POST['price'];
            $email = $_POST['rim'];
            $phone = $_POST['gears'];
            $bgroup = $_POST['brake'];
            $bgroup = $_POST['available'];

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