<?php
    
    include('components/db_config.php');

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $id_array = explode(",", $id);
        $book_user = $id_array[0]; 
        $book_id = $id_array[1]; 
        $current_user_id = $id_array[2];

        $query = "SELECT * FROM book WHERE user = $book_user AND id = $book_id";
        $result = mysqli_query($conn, $query);
        $book = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        $query = "SELECT * FROM user WHERE id = $book_user";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
    }

    if(isset($_POST['delete'])) {
        $book_to_delete = mysqli_real_escape_string($conn, $_POST['book']);
        $book_to_delete_ids = explode(",", $book_to_delete);

        $query = "DELETE FROM book WHERE user = $book_to_delete_ids[0] AND
                    id = $book_to_delete_ids[1]";
        if(mysqli_query($conn, $query)) {
            header('Location: index.php?user='.$current_user_id);
        } else {
            echo 'Error: '.mysqli_error($conn);
        }
    }

    if(isset($_POST['update'])) {
        $book_to_update = mysqli_real_escape_string($conn, $_POST['book']);
        $book_to_update_ids = explode(",", $book_to_update);

        header('Location: update_book.php?updateid='.$book_to_update_ids[0].','.$book_to_update_ids[1]);
    }


?>

<!DOCTYPE html>
<html>

    <?php include('components/header.php') ?>

    <?php if($book == null): ?>

        <h1 class="center white-text">There is not such book!</h1>
        <div class="center">
        <a class="btn white center teal-text" 
            href="index.php?user=<?php echo $current_user_id; ?>">Return</a>
        </div>

    <?php else: ?>

        <div class="container center">
            <div class="card z-depth-0 radius-card">
                <img class="logo-card" src="img/card.webp">
                <h3> <?php echo $book['title']; ?></h3>
                <h4>Author: <?php echo $book['author']; ?> </h4>
                <h5>Category: <?php echo $book['category']; ?>  </h5>
                <h5>Year: <?php echo $book['year']; ?>  </h5>
                <p style="padding-bottom: 10px;"><strong>Abstract: </strong> <?php echo $book['description']; ?></p>
            
                <?php if($book_user == $current_user_id): ?>
                    
                    <form action="" method="POST" style="padding-bottom: 10px;">
                        <input type="hidden" name="book" 
                            value="<?php echo $book_user.",".$book_id; ?>">
                        <input type="submit" name="update" value="Change"
                            class="btn z-depth-0">
                        <input type="submit" name="delete" value="delete" 
                            class="btn z-depth-0">
                    </form> 

                <?php else: ?>
                
                    <h6>Owner of the book: <?php echo $user['username']; ?></h6>
                    <h6>Contact number: <?php echo $user['contact']; ?></h6>
                    <h6 style="padding-bottom: 10px;">Email: <?php echo $user['email']; ?></h6>

                <?php endif; ?>    

            </div>
        </div>

    <?php endif; ?>

    <?php include('components/footer.php') ?>

</html>
