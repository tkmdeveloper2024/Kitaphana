<?php
   require __DIR__ .  '/../Contents/header.php';
?>

<div class="container">
    <h1>Library books</h1>
    <a href="index.php?action=create">Create Book</a>
    <div class="row my-4">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Ady</th>
                <th>Awtory</th>
                <th>Gornusi</th>
                <th>Yyly</th>
                <th>Surat</th>
                <th>PDF</th>
            </tr>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['bookName']; ?></td>
                <td><?php echo $row['bookAuthor']; ?></td>
                <td><?php echo $row['bookCategory']; ?></td>
                <td><?php echo $row['bookYear']; ?></td>
                <td><?php echo $row['bookCoverImagePath']; ?></td>
                <td><?php echo $row['bookPagesImagePath']; ?></td>
                <td>
                    <a href="index.php?action=show&id=<?php echo $row['id']; ?>" class="btn btn-info">Show</a>
                    <a href="index.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="index.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-warning">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<?php
   require __DIR__ .  '/../Contents/footer.php';
?>