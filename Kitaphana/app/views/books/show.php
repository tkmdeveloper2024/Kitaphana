<?php
   require __DIR__ .  '/../Contents/header.php';
?>
    
    
    <h1>Books Details</h1>
    <p>ID: <?php echo $product['id']; ?></p>
    <p>Ady: <?php echo $product['bookName']; ?></p>
    <p>Awtory: <?php echo $product['bookAuthor']; ?></p>
    <p>Gornusi: <?php echo $product['bookCategory']; ?></p>
    <a href="index.php">Back to Books</a>


    <?php
   require __DIR__ .  '/../Contents/footer.php';
?>
