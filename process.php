<?php
include("connect.php");

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $sql = "INSERT INTO books (title, author, type, description) VALUES ('$title', '$author', '$type', '$description')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to index.php with success message
        header("Location: index.php?message=Book added successfully");
        exit(); // Ensure no further code is executed
    } else {
        // Redirect to index.php with error message
        header("Location: index.php?error=" . urlencode("Error adding book: " . mysqli_error($conn)));
        exit();
    }
} else {
    // Redirect back to index.php if accessed without form submission
    header("Location: index.php?error=" . urlencode("Invalid request"));
    exit();
}
?>
