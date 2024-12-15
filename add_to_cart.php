<?php
session_start();

// Check if product ID, title, and price are provided
if (isset($_GET['id']) && isset($_GET['title']) && isset($_GET['price'])) {
    $product_id = intval($_GET['id']);
    $product_title = htmlspecialchars($_GET['title']);
    $product_price = floatval($_GET['price']);

    // Create the cart session if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1; // Increment quantity
    } else {
        // Add the product to the cart
        $_SESSION['cart'][$product_id] = [
            'title' => $product_title,
            'price' => $product_price,
            'quantity' => 1
        ];
    }

    // Show a success message
    $response = ['success' => true, 'message' => 'Product added to cart'];
    echo json_encode($response);
    exit;
} else {
    // Return an error message
    $response = ['success' => false, 'message' => 'Invalid product information'];
    echo json_encode($response);
    exit;
}
?>
