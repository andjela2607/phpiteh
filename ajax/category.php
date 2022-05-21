<?php

    $categories[] = "Romance"; $categories[] = "Classic"; $categories[] = "Poetry";
    $categories[] = "Thriller"; $categories[] = "Historical Fiction"; $categories[] = "Horror";
    $categories[] = "Action"; $categories[] = "Adventure"; $categories[] = "Comic Book";
    $categories[] = "Novel"; $categories[] = "Detective"; $categories[] = "Mistery";
    $categories[] = "Fantasy"; $categories[] = "Lirical Fiction"; $categories[] = "Biography";

    $query = $_REQUEST['query'];
    $suggestion = "";  // responseText

    if($query !== "") {
        $query = strtolower($query);
        $length = strlen($query);

        foreach($categories as $category) {
            if(stristr($query, substr($category, 0, $length))) {
                if($suggestion == "") {
                    $suggestion = $category;
                } else {
                    $suggestion .= ", $category";
                }
            }
        }

    }
    if($suggestion == "") {
        echo 'No suggestions';
    } else {
        echo $suggestion;
    }
 
?>