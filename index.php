<?php
    
    include('components/db_config.php');

    $query = "SELECT * FROM book";
    $result = mysqli_query($conn, $query);
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

?>

<!DOCTYPE html>
<html>

    <?php include('components/header.php') ?>

    <div class="container">
        <div class="row">

            <?php foreach($books as $book): ?>

                <div class="col s6 md3">
                        <div class="card z-depth-0 radius-card">
                            <img src="img/card.webp" class="logo-card">
                            <div class="card-content center">
                                <h6> <?php echo htmlspecialchars($book['title']); ?> </h6>
                                <p> <?php echo htmlspecialchars($book['author']); ?></p>
                            </div>
                            <div class="card-action right-align radius-card">
                                <a class="orange-text text-darken-2" href="book.php?id=<?php echo $book['user'].",".$book['id'].",".$userID;?>">more info</a>
                            </div>
                        </div>
                    </div>

            <?php endforeach; ?>

        </div>
    </div>

    <?php include('components/footer.php') ?>

</html>

