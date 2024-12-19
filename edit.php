<?php
include("connect.php");

$id = $_GET['id'];
$sql = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $sql);
$book = mysqli_fetch_assoc($result);

if (isset($_POST["update"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $updateSql = "UPDATE books SET title='$title', author='$author', type='$type', description='$description' WHERE id = $id";

    if (mysqli_query($conn, $updateSql)) {
        header("Location: index.php?message=Book updated successfully");
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Edit Book</title>
</head>
<body>
    <div class="container">
        <h1>Edit Book</h1>
        <form action="" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="title" value="<?php echo $book['title']; ?>" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="author" value="<?php echo $book['author']; ?>" required>
            </div>
            <div class="form-element my-4">
                <select name="type" class="form-select" required>
                    <option value="adventure" <?php if ($book['type'] == 'adventure') echo 'selected'; ?>>Adventure</option>
                    <option value="fantasy" <?php if ($book['type'] == 'fantasy') echo 'selected'; ?>>Fantasy</option>
                    <option value="SciFi" <?php if ($book['type'] == 'SciFi') echo 'selected'; ?>>Sci-Fi</option>
                    <option value="horror" <?php if ($book['type'] == 'horror') echo 'selected'; ?>>Horror</option>
                </select>
            </div>
            <div class="form-element my-4">
                <textarea class="form-control" name="description" rows="3" required><?php echo $book['description']; ?></textarea>
            </div>
            <div class="form-element my-4">
                <input type="submit" class="btn btn-primary" name="update" value="Update Book">
            </div>
        </form>
    </div>
</body>
</html>
