<?php
session_start();

// Check if product ID is provided
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Remove the product from the wishlist
    if (isset($_SESSION['wishlist'][$product_id])) {
        unset($_SESSION['wishlist'][$product_id]);
    }
}

// Redirect back to wishlist
header("Location: wishlist.php");
exit();
?>
