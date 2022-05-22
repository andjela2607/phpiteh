<?php
    
    include('components/db_config.php');

    if(isset($_GET['updateid'])) {
        $book_to_update = mysqli_real_escape_string($conn, $_GET['updateid']);
        $book_to_update_ids = explode(",", $book_to_update);

        // prvo vadimo knjigu koju treba da updatetujemo iz baze
        $query = "SELECT * FROM book WHERE user=$book_to_update_ids[0] AND
                id=$book_to_update_ids[1]";
        $result = mysqli_query($conn, $query);
        $book = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        // promenljive postavljamo na trenutne vrednosti iz baze a ne na "" kao inače
        $title = $book['title'];
        $author = $book['author'];
        $year = $book['year'];
        $category = $book['category'];
        $description = $book['description'];
        $errors = ['title' => '', 'author' => '', 'description' => '', 'category' => '', 'year' => ''];

        if(isset($_POST['update'])) {

            include('components/add_update_form_validation.php');
    
            if(!array_filter($errors)) {
                $title = $_POST['title'];
                $author = $_POST['author'];
                $year = $_POST['year'];
                $category = $_POST['category'];
                $description = $_POST['description'];
    
                // upit za izmenu vrednosti u bazi
                $query = "UPDATE book SET title = '$title', author = '$author', year = $year,
                        category = '$category', description = '$description' 
                        WHERE user=$book_to_update_ids[0] AND id=$book_to_update_ids[1]";
    
                if(mysqli_query($conn, $query)) {
                    header('Location: book.php?id='.$book_to_update.','.$book_to_update_ids[0]);
                } else {
                    echo 'Error: '.mysqli_error($conn);
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html>

    <?php include('components/header.php') ?>

    <section class="container grey-text">
        <h4 class="center white-text">Change the book</h4>
        
        <!-- FORM -->
        <form class="white credentials form" action="" method="POST">

            <?php include('components/add_update_form.php') ?>
            
            <div class="center">
                <input type="submit" name="update" value="Change" 
                    class="btn z-depth-0">
            </div>
        </form>
    </section>

    <?php include('components/footer.php') ?>

</html>