<script>
        // AJAX suggestions for country 
        function showSuggestion(str="") {   
            if(str.length == 0) {  
                document.getElementById("suggestion").innerHTML = ""; // if we did not type anything nothing will be shown inside of span
            } else {  
                // AJAX request
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {    // when the request state is changed
                    if(this.readyState == 4 && this.status == 200) {   // checking params for request readiness
                        document.getElementById("suggestion").innerHTML = this.responseText;   // writing suggestions inside of a span
                    }
                }
                xmlhttp.open("GET", "ajax/category.php?query="+str, true);     // making request for what we typed in to a file that finds the suggestions
                xmlhttp.send();  // sending request
            }
        }
</script>
    
    
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
    <input type="text" name="category" value="<?php echo htmlspecialchars($category) ?>"
            onkeyup="showSuggestion(this.value)">
    <div class="red-text"><?php echo $errors['category']; ?></div>
    <p><span id="suggestion"></span></p>

    <label for="description">Abstract:</label>
    <input type="text" name="description" value="<?php echo htmlspecialchars($description) ?>">
    <div class="red-text"><?php echo $errors['description']; ?></div>