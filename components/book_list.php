<!-- kod za ubacivanje knjiga na početnu stranu i stranu profila korisnika -->
<div class="row">
    <!-- prolazimo kroz sve knjige i unosimo ih na stranicu -->
    <?php foreach($books as $book): ?>
    	<div class="col s6 md3">
            <div class="card z-depth-0 radius-card">
                <img src="img/card.webp" class="logo-card">
                <div class="card-content center">
                    <h6> <?php echo htmlspecialchars($book['title']); ?> </h6>
                    <p> <?php echo htmlspecialchars($book['author']); ?></p>
                </div>
                <div class="card-action right-align radius-card">
                    <a class="orange-text text-darken-2" href="book.php?id=<?php echo $book['user']
                        .','.$book['id'].','.$userID?>">more info</a>
                </div>
            </div>
        </div>
     <?php endforeach; ?>
</div>