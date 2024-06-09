<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form method="POST" action="index.php?action=edit&id=<?php echo $product['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description"><?php echo $product['description']; ?></textarea>
        <br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to Books</a>
</body>
</html>
