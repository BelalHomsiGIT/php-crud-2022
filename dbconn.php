<?php
    $conn = mysqli_connect("localhost", "root", "", "php-crud-2022");

    if(!$conn){
        die("Connection Failed " . mysqli_connect_errno());
    }
?>