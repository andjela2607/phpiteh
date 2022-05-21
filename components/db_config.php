<?php

    $conn = mysqli_connect('localhost','admin','admin','bookstore');

    if(!$conn) {
        echo 'Connection error: '.mysqli_connect_error();
    }

?>