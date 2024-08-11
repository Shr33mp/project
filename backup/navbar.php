<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beer-Tual - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <style>
        .product-card {
            margin-bottom: 20px;
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            aspect-ratio: 1;
        }
        .cart-item {
            margin-bottom: 10px;
        }
        #cart-section {
            position: sticky;
            top: 20px;
        }
        .row-cols-3 > .col {
            flex: 1 0 auto;
            max-width: calc(33.333% - 20px);
            margin-bottom: 20px;
        }
        .row-cols-3 {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        @media (max-width: 767.98px) {
            .row-cols-3 > .col {
                max-width: calc(50% - 10px);
            }
        }
        @media (max-width: 575.98px) {
            .row-cols-3 > .col {
                max-width: 100%;
            }
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fs-4" href="home.php">Beer-tual</a>
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header text-white border-bottom">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column flex-lg-row p-4">
                <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3" id="navbarNav">
                    <li class="nav-item mx-2">
                        <a class="nav-link home" href="home.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link about" href="about.php">About us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link ourteam" href="ourteam.php">Our Team</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link products" href="products.php">Product</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link add" href="add.php">Add an item</a>
                    </li>
                </ul>
                <div class="d-flex justify-content-center flex-lg-row align-items-center gap-3">
                    <a href="#login" class="text-white">Login</a>
                    <a href="signup.php" class="text-white text-decoration-none px-3 py-1 rounded-4" style="background-color: red">Signup</a>
                </div>
            </div>
        </div>
    </div>
</nav>
