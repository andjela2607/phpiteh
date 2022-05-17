<?php

    $conn = mysqli_connect('localhost','admin','admin','phpiteh');

    if(!$conn) {
        echo 'Connection error: '.mysqli_connect_error();
    }

?>