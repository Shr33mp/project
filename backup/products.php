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
<body class="vh-100 overflow-hidden">
    <?php include 'navbar.php'; ?>
    <div class="container my-5">
        <div class="row">
            <div id="products-section" class="col-md-8">
                <div class="row row-cols-3">
                    <?php
                    $drinksFile = 'drinks.json';
                    $drinks = file_exists($drinksFile) ? json_decode(file_get_contents($drinksFile), true) : [];

                    foreach ($drinks as $drink) {
                        echo '<div class="col">';
                        echo '<div class="card product-card">';
                        echo '<img src="' . $drink['image'] . '" class="card-img-top product-image" alt="' . $drink['name'] . '">';
                        echo '<div class="card-body text-center">';
                        echo '<h5 class="card-title">' . $drink['name'] . '</h5>';
                        echo '<button class="btn btn-primary add-to-cart" onclick="addToCart(\'' . $drink['name'] . '\')">Add to Cart</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <div id="cart-section" class="col-md-4">
                <h4>Your Cart</h4>
                <ul id="cart-items" class="list-group">
                    <!-- Cart items will be appended here -->
                </ul>
                <button id="checkout-btn" class="btn btn-success mt-3">Checkout</button>
                <button id="remove-all-btn" class="btn btn-danger mt-3">Remove All</button>
            </div>
        </div>
    </div>

    <!-- Toast for notifications -->
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

    <script>
        function addToCart(product) {
            // Show toast notification
            let toast = document.getElementById('toast');
            let toastBody = document.getElementById('toast-body');
            toastBody.textContent = `${product} added to cart!`;
            let toastInstance = new bootstrap.Toast(toast);
            toastInstance.show();

            // Add product to cart
            let cartItems = document.getElementById('cart-items');
            let listItem = document.createElement('li');
            listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            listItem.textContent = product;
            
            // Create remove button
            let removeButton = document.createElement('button');
            removeButton.className = 'btn btn-danger btn-sm';
            removeButton.textContent = 'Remove';
            removeButton.onclick = function() {
                listItem.remove();
            };
            
            listItem.appendChild(removeButton);
            cartItems.appendChild(listItem);
        }

        document.getElementById('checkout-btn').addEventListener('click', function() {
            let cartItems = document.querySelectorAll('#cart-items .list-group-item');
            let products = Array.from(cartItems).map(item => item.textContent.replace('Remove', '').trim());

            fetch('process_transaction.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ products })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                } else {
                    alert(`Transaction successful! Transaction number: ${data.transaction_number}`);
                    // Optionally, clear cart after checkout
                    document.getElementById('cart-items').innerHTML = '';
                }
            })
            .catch(error => console.error('Error:', error));
        });

        document.getElementById('remove-all-btn').addEventListener('click', function() {
            document.getElementById('cart-items').innerHTML = '';
        });
    </script>
</body>
</html>
