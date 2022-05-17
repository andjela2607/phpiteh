<?php

    include('db_config.php');

    $current_user = "";
    if(isset($_GET['user'])) {
        $userID = mysqli_real_escape_string($conn, $_GET['user']);
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
        /*
        .navul {
            margin-right: 100px;
        }
        .logo {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
        .dets {
            padding-bottom: 20px;
        } */
    </style>
</head>
<body class="teal lighten-2">
    <nav class="white header z-depth-0">
        <div class="container">
            
            <?php if(!$current_user): ?>

                
                <a href="index.php" class="teal-text bookstore-text">
                    <img class="logo" src="img/logo.png">BookStore</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down navul">
                    <li><a href="registration.php" class="btn z-depth-0">Registration</a></li>
                    <li><a href="login.php" class="btn z-depth-0">Login</a></li>
                </ul>

            <?php else: ?>

                <a href="index.php" class="teal-text">
                    BookStore</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down navul">
                    <li><a href="registration.php" class="btn brand z-depth-0">Add Book</a></li>
                    <li><a href="login.php" class="btn brand z-depth-0">Your Books</a></li>
                    <li><a href="login.php" class="btn brand z-depth-0">Logout</a></li>
                </ul>

            <?php endif; ?>

        </div>
    </nav>