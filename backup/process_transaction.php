<?php
header('Content-Type: application/json');

// Include database connection file
include 'db_connect.php';

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['products']) || !is_array($data['products'])) {
    echo json_encode(['error' => 'Invalid data']);
    exit;
}
$products = $data['products'];

// Generate a random transaction number
$transactionNumber = uniqid('TXN_');

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO transactions (transaction_number, product_name) VALUES (?, ?)");
if (!$stmt) {
    echo json_encode(['error' => $conn->error]);
    exit;
}
$stmt->bind_param("ss", $transactionNumber, $productName);

// Insert products
foreach ($products as $product) {
    $productName = $product;
    if (!$stmt->execute()) {
        echo json_encode(['error' => $stmt->error]);
        exit;
    }
}

// Close connection
$stmt->close();
$conn->close();

// Return the transaction number
echo json_encode(['transaction_number' => $transactionNumber]);
?>