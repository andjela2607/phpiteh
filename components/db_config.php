<!-- Konkecija sa bazom koju unosimo u svaki fajl u aplikaciji -->
<?php

    $conn = mysqli_connect('localhost','admin','admin','bookstore');
    // $conn = konekcija sa bazom
    // parametri u funkciji - domen, user, password, database

    if(!$conn) {
        echo 'Connection error: '.mysqli_connect_error();
        // u slučaju greške pri povezivanju ispisuje se greška 
        // (npr nije uključen MySQL)
    }

?>