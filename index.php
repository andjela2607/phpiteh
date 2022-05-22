<?php
    
    include('components/db_config.php');

    $query = "SELECT * FROM book";   // upit za vracanje svih knjiga iz baze
    $result = mysqli_query($conn, $query);   // vracanje tabele za dati upit
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);   // pretvaranje tabele u niz books
    mysqli_free_result($result);  // brisanje tabele iz memorije

?>

<!DOCTYPE html>
<html>

    <?php include('components/header.php') ?> 

        <div class="container">
            <?php include('components/book_list.php') ?>
        </div>

    <?php include('components/footer.php') ?>

</html>

