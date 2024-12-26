<?php 
    // Database connection settings
    $host = "localhost";
    $user = "root";
    $password = '';
    $db_name = "portfolio_database";

    // Create a connection
    $con = mysqli_connect($host, $user, $password, $db_name);

    // Check the connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>
