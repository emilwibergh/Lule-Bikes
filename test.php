<?php
    $mysqli = new mysqli('localhost', 'D0018E', 'D0018E', 'D0018E');

    if($mysqli->connect_error) { die('Error'.('.$mysqli->connect_errno.').$mysqli->connect_error);
    } else {
        echo "Connected to database";
    }
?>