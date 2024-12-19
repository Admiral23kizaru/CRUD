<?php
include("connect.php");

$id = $_GET['id'];
$sql = "DELETE FROM books WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?message=Book deleted successfully");
} else {
    die("Error: " . mysqli_error($conn));
}
?>
