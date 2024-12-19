<?php
include("connect.php");

$id = $_GET['id'];
$sql = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $sql);
$book = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>View Book</title>
</head>
<body>
    <div class="container">
        <h1><?php echo $book['title']; ?></h1>
        <p><strong>Author:</strong> <?php echo $book['author']; ?></p>
        <p><strong>Type:</strong> <?php echo $book['type']; ?></p>
        <p><strong>Description:</strong> <?php echo $book['description']; ?></p>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
</body>
</html>
