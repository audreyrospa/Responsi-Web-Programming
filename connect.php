<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "resp";

    $connect = new mysqli($hostname, $username, $password, $database);

    if ($connect-> connect_error) {
        die('sorry connection failed :'.$connect->connect_error);
    }

?>