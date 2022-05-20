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
    }

    if(isset($_POST['delete'])) {

    }

    if(isset($_POST['update'])) {
        
    }


?>

<!DOCTYPE html>
<html>

    <?php include('components/header_user.php') ?>

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
                <p style="padding-bottom: 10px;"><strong>Abstract: </strong> <?php echo $book['description']; ?></p>
            
                <?php if($book_user == $current_user_id): ?>
                    
                    <form action="" method="POST" style="padding-bottom: 10px;">
                        <input type="hidden" name="id_to_delete" 
                            value="<?php echo $book_user.",".$book_id; ?>">
                        <input type="submit" name="update" value="Change"
                            class="btn z-depth-0">
                        <input type="submit" name="delete" value="delete" 
                            class="btn z-depth-0">
                    </form> 

                <?php else: ?>
                

                <?php endif; ?>    

            </div>
        </div>

    <?php endif; ?>

    <?php include('components/footer.php') ?>

</html>
