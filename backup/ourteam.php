<!-- ourteam.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beer-Tual - Our Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="vh-100 overflow-hidden">
    <?php include 'navbar.php'; ?>
    <div class="container my-5">
        <div class="row">
            <div id="products-section" class="col-md-8">
                <div id="content" class="text-center fs-4">This is our team</div>
            </div>
            <div id="cart-section" class="col-md-4" style="display: none;">
                <!-- Cart Section HTML -->
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="toast-body" class="toast-body">
                Product added to cart!
            </div>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
