<?php

    include('db_config.php');

    $flag = 0;
    if(isset($_GET['user'])) {
        $userID = mysqli_real_escape_string($conn, $_GET['user']);
        $flag = 1;
    }

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $id_array = explode(",", $id);
        $flag = 1;
        $userID = $id_array[2];
    }

    if(isset($_GET['updateid'])) {
        $id = mysqli_real_escape_string($conn, $_GET['updateid']);
        $id_array = explode(",", $id);
        $flag = 1;
        $userID = $id_array[0];
    }

?>

<head>
    <title>BookStore</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style type="text/css">
        /* CSS */
        .bookstore-text {
            font-size: xx-large;
        }
        .logo {
            max-width: 35px;
            height: auto;
        }

        .form {
            padding: 10px;
            margin-left: 25%;
            width: 50%;
            text-align: center;
            border-radius: 15px;
        }
        .logo-card {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            padding: 10px;
        }
        .radius-card {
            border-radius: 20px;
        }
    </style>
</head>
<body class="teal lighten-2">
    <nav class="white header z-depth-0">
        <div class="container">

            <?php if($flag == 0): ?>

                <a href="index.php" class="teal-text bookstore-text">
                    <img class="logo" src="img/logo.png">Book</a>
                <a href="index.php" class="teal-text text-darken-4 bookstore-text">Store</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down navul">
                    <li><a href="registration.php" class="btn z-depth-0">Registration</a></li>
                    <li><a href="login.php" class="btn z-depth-0">Login</a></li>
                </ul>

            <?php elseif($flag == 1): ?>
            
                <a href="index.php?user=<?php echo $userID; ?>" class="teal-text bookstore-text">
                    <img class="logo" src="img/logo.png">Book</a>
                <a href="index.php?user=<?php echo $userID; ?>" class="teal-text text-darken-4 bookstore-text">Store</a>
                
                <ul id="nav-mobile" class="right hide-on-small-and-down navul">
                    <li><a href="add.php?user=<?php echo $userID ?>" class="btn brand z-depth-0">Add Book</a></li>
                    <li><a href="profile.php?user=<?php echo $userID ?>" class="btn brand z-depth-0">Your Books</a></li>
                    <li><a href="login.php" class="btn brand z-depth-0">Logout</a></li>
                </ul>

            <?php endif; ?>
        </div>
    </nav>