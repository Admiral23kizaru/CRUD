<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Add New Book</title>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4"> 
            <h1>Add New Book</h1>
            <div>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
        </header>        
        <form id="addBookForm" action="process.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="title" placeholder="Book Title" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="author" placeholder="Author Name" required>
            </div>
            <div class="form-element my-4">
                <select name="type" class="form-select" required>
                    <option value="">Select Book Type</option>
                    <option value="adventure">Adventure</option>
                    <option value="fantasy">Fantasy</option>
                    <option value="SciFi">Sci-Fi</option>
                    <option value="horror">Horror</option>
                </select>
            </div>
            <div class="form-element my-4">
                <textarea class="form-control" name="description" rows="3" placeholder="Book Description" required></textarea>
            </div>
            <div class="form-element my-4">
                <input type="submit" class="btn btn-primary" name="create" value="Add Book"> 
            </div>
        </form>
    </div>

    <?php if (isset($_GET['message'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "<?php echo htmlspecialchars($_GET['message']); ?>",
            });
        </script>
    <?php elseif (isset($_GET['error'])): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "<?php echo htmlspecialchars($_GET['error']); ?>",
            });
        </script>
    <?php endif; ?>

    <script>
        document.getElementById('addBookForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting immediately

            Swal.fire({
                title: 'Add New Book',
                text: "Are you sure you want to add this book?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit the form if confirmed
                }
            });
        });
    </script>
</body>
</html>
