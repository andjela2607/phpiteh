<?php

    include('components/db_config.php');

    if(isset($_GET['user'])) {
        $userID = mysqli_real_escape_string($conn, $_GET['user']);
    }

    $title = $author = $description = $category = $year = "";
    $errors = ['title' => '', 'author' => '', 'description' => '', 'category' => '', 'year' => ''];

    if(isset($_POST['insert'])) {

        if(empty($_POST['title'])) {
            $errors['title'] = 'Title is required!';
        } else {
            $title = $_POST['title'];
        }

        if(empty($_POST['author'])) {
            $errors['author'] = 'Author is required!';
        } else {
            $author = $_POST['author'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $author)) {
                $errors['author'] = 'Wrong input for the author!'; 
                $author = '';
            }
        }

        if(empty($_POST['year'])) {
            $errors['year'] = 'Year is required!';
        } else {
            $yearStr = $_POST['year'];
            if(strlen($yearStr) != 4 || intval($yearStr) == 1) {
                $errors['year'] = 'Wrong input for year!';
            } else {
                $year = intval($yearStr);
                if($year < 1301 || $year > date("Y")) {
                    $errors['year'] = 'Wrong input for year!';
                } 
            }
        }

        if(empty($_POST['category'])) {
            $errors['category'] = 'Category is required!';
        } else {
            $category = $_POST['category'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $category)) {
                $errors['category'] = 'Wrong input for the category!'; 
                $category = '';
            }
        }

        if(empty($_POST['description'])) {
            $errors['description'] = 'Abstract is required!';
        } else {
            $description = $_POST['description'];
        }

        if(!array_filter($errors)) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $year = $_POST['year'];
            $category = $_POST['category'];
            $description = $_POST['description'];

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

    <?php include('components/header_user.php') ?>

    <section class="container grey-text">
        <h4 class="center white-text">Add book</h4>
        
        <!-- FORM -->
        <form class="white credentials form" action="" method="POST">
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>       

            <label for="author">Author:</label>
            <input type="text" name="author" value="<?php echo htmlspecialchars($author) ?>">
            <div class="red-text"><?php echo $errors['author']; ?></div> 
            
            <label for="year">Year:</label>
            <input type="text" name="year" value="<?php echo htmlspecialchars($year) ?>">
            <div class="red-text"><?php echo $errors['year']; ?></div>  

            <label for="category">Category:</label>
            <input type="text" name="category" value="<?php echo htmlspecialchars($category) ?>">
            <div class="red-text"><?php echo $errors['category']; ?></div>

            <label for="description">Abstract:</label>
            <input type="text" name="description" value="<?php echo htmlspecialchars($description) ?>">
            <div class="red-text"><?php echo $errors['description']; ?></div>
            
            <div class="center">
                <input type="submit" name="insert" value="Add book" 
                    class="btn z-depth-0">
            </div>
        </form>
    </section>

    <?php include('components/footer.php') ?>

</html>