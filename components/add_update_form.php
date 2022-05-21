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