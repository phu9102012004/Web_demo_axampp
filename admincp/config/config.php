<?php   
    $mysqli = new mysqli("localhost", "root", "", "web_mysqli");
    if ($mysqli->connect_errno) {
        echo("Connection failed: " . $mysqli->connect_error);
        exit();
    }
?>