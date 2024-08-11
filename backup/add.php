<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beer-Tual - Add a Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="vh-100 overflow-hidden">
    <?php include 'navbar.php'; ?>
    <section class="container form-container grey-text">
        <div class="w-100">           
            <form action="add.php" class="bg-light p-4 rounded" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Name of the drink</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredients (comma separated)</label>
                    <input type="text" class="form-control" name="ingredients" id="ingredients" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload image</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>
                <div class="center">
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $imageName = $_FILES['image']['name'];
    $imageTempName = $_FILES['image']['tmp_name'];
    $imagePath = 'uploads/' . basename($imageName);

    if (move_uploaded_file($imageTempName, $imagePath)) {
        $drinksFile = 'drinks.json';
        $drinks = file_exists($drinksFile) ? json_decode(file_get_contents($drinksFile), true) : [];

        $drinks[] = [
            'name' => $title,
            'ingredients' => $ingredients,
            'image' => $imagePath,
        ];

        file_put_contents($drinksFile, json_encode($drinks));

        echo "<script>alert('Drink added successfully!');</script>";
    } else {
        echo "<script>alert('Failed to upload image.');</script>";
    }
}
?>
