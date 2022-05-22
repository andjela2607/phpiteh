<?php

    include('components/db_config.php');

    if(isset($_GET['user'])) {
        $userID = mysqli_real_escape_string($conn, $_GET['user']);
    }

    $title = $author = $description = $category = $year = "";
    $errors = ['title' => '', 'author' => '', 'description' => '', 'category' => '', 'year' => ''];

    if(isset($_POST['insert'])) {

        include('components/add_update_form_validation.php');  // unosimo validaciju

        if(!array_filter($errors)) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $year = $_POST['year'];
            $category = $_POST['category'];
            $description = $_POST['description'];

            // upit za unos knjige u bazu
            $query = "INSERT INTO book(user, title, author, year, category, description) 
                    VALUES ('$userID', '$title', '$author', $year, '$category', '$description')";

            if(mysqli_query($conn, $query)) {
                header('Location: index.php?user='.$userID);
            } else {
                echo 'Error: '.mysqli_error($conn);
            }
        }


    }
    
?>

<!DOCTYPE html>
<html>

    <?php include('components/header.php') ?>

    <section class="container grey-text">
        <h4 class="center white-text">Add book</h4>
        
        <!-- FORM -->
        <form class="white form" action="" method="POST">
        
        <!-- unos forme bez submit dugmeta -->
            <?php include('components/add_update_form.php') ?>
            
            <div class="center">
                <input type="submit" name="insert" value="Add book" 
                    class="btn z-depth-0">
            </div>
        </form>
    </section>

    <?php include('components/footer.php') ?>

</html>