<?php
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "todo-app-using-php-mysql");

    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if(!$connection){
        die("Connection failed: ".mysqli_connect_error());
    }

    // echo "Connected successfully";
?>
