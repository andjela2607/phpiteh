<!-- Validacija za formu za dodavanje i menjanje knjiga -->

<?php

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
        // gledamo da li unos ima 4 cifre
        // i gledamo da li je unesen broj, ako nije unesen broj intval vraća 1
        // intval ~= strtoint
        if(strlen($yearStr) != 4 || intval($yearStr) == 1) {  
            $errors['year'] = 'Wrong input for year!';
        } else {
            $year = intval($yearStr);
            // date("Y") trenutna godina
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

?>