<?php
session_start();

// Check if product ID is provided
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Remove the product from the cart
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Redirect back to the cart
header("Location: cart.php");
exit;
?>
