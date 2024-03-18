<?php
    $host = "localhost:3307";
    $uname = "infoland";
    $pass = "infoland";
    $db = "cp_infoland";

    try {
        $conn = mysqli_connect($host, $uname, $pass, $db);
    } catch (Exception $exception) {
        echo $exception;
    }