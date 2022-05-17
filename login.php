<?php
    
    include('components/db_config.php');

    $username = $password = "";
    $errors = ['username' => '', 'password' => ''];

    if(isset($_POST['login'])) {
          
        if(empty($_POST['username'])) {
            $errors['username'] = 'Username is required!';
        } else {
            $username = $_POST['username'];

            $query = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($result);
            mysqli_free_result($result);

            if($user== null) {
                $errors['username'] = "User with this username does not exist!";
            } elseif (empty($_POST['password'])) {
                $errors['password'] = "Password is required!";
            } else {
                $password = $_POST['password'];

                if(strcmp($password, $user['password'])) {
                    $errors['password'] = "Wrong password!";
                } else {
                    header('Location: index.php?user='.$user['id']);
                }
            }
        }

    }
?>

<!DOCTYPE html>
<html>

    <?php include('components/header.php') ?>

    <section class="container grey-text">
        <h4 class="center white-text">Login to post books</h4>
        
        <!-- FORM -->
        <form class="white credentials form" action="" method="POST">      
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
            <div class="red-text"><?php echo $errors['username']; ?></div>            

            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
            <div class="red-text" style="padding-bottom:10px;"><?php echo $errors['password']; ?></div>             
            
            <div class="center">
                <input type="submit" name="login" value="Login" class="btn z-depth-0">
            </div>
        </form>
    </section>

    <?php include('components/footer.php') ?>

</html>