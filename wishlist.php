<?php
session_start();

// Handle adding a product to the wishlist
if (isset($_GET['id'], $_GET['title'], $_GET['price'], $_GET['image'])) {
    $product_id = intval($_GET['id']);
    $product_title = htmlspecialchars($_GET['title'], ENT_QUOTES, 'UTF-8');
    $product_price = floatval($_GET['price']);
    $product_image = htmlspecialchars($_GET['image'], ENT_QUOTES, 'UTF-8');

    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
    }

    // Add the product only if it's not already in the wishlist
    if (!isset($_SESSION['wishlist'][$product_id])) {
        $_SESSION['wishlist'][$product_id] = [
            'title' => $product_title,
            'price' => $product_price,
            'image' => $product_image
        ];
    }

    // Redirect to avoid duplicate GET requests
    header("Location: wishlist.php");
    exit();
}

// Handle removing a product from the wishlist
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $remove_id = intval($_GET['remove']);
    if (isset($_SESSION['wishlist'][$remove_id])) {
        unset($_SESSION['wishlist'][$remove_id]);
    }
    header("Location: wishlist.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            width: 100%;
            height: 100vh;
            background: linear-gradient(to bottom, 
    rgb(144, 224, 239) 0%,  /* Light Teal */
    rgb(245, 243, 231) 50%, /* Beige */
    rgb(255, 138, 128) 100% /* Coral Pink */
);

         background-position: center;
            background-repeat: no-repeat;
            background-size: cover;}
    nav {
            width: 100%;
            height: 10vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 5%;
        }
        .nav-container {
            display: flex;
            align-items: center;
            width: 100%;
        }
        .logo img {
            width: 80px;
        }
        .nav-container .links {
            display: flex;
            margin-left: auto;
        }
        .nav-container .links .link {
            margin: 0 15px;
            position: relative;
        }
        .nav-container .links .link a {
            text-decoration: none;
            color: white;
            font-size: 1.2rem;
            font-weight: 500;
            padding: 5px 10px;
            transition: color 0.3s ease;
        }
        .nav-container .links .link a:hover {
            color: #f0be61;
        }
        .nav-container .links .link::before {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #d2911c;
            transition: width 0.3s ease;
        }
        .nav-container .links .link:hover::before {
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="nav-container">
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="logo">
                </a>
            </div>
            <div class="links">
                <div class="link"><a href="index.php">Home</a></div>
                <div class="link"><a href="allproducts.php">All Products</a></div>
                <div class="link"><a href="contactus.php">Contact Us</a></div>
            </div>
        </div>
    </nav>

</head>
<body class="bg-gray-50">
    <div class="max-w-6xl mx-auto p-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">❤️ Your Wishlist ❤️</h1>

        <?php if (!empty($_SESSION['wishlist'])): ?>
            <div class="bg-white rounded-lg shadow-lg p-6">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left text-lg text-gray-600 py-3">Product</th>
                            <th class="text-left text-lg text-gray-600 py-3">Price</th>
                            <th class="text-right text-lg text-gray-600 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['wishlist'] as $id => $item): ?>
                            <tr class="border-b">
                                <!-- Product Details -->
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="<?= !empty($item['image']) ? 'images/' . $item['image'] : 'images/fallback.jpeg'; ?>" 
                                             alt="Product Image" 
                                             class="h-16 w-16 rounded mr-4 object-cover">
                                        <h2 class="text-lg font-semibold text-gray-800">
                                            <?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?>
                                        </h2>
                                    </div>
                                </td>
                                <!-- Product Price -->
                                <td class="py-4">
                                    <span class="text-gray-800 font-medium">€<?= number_format($item['price'], 2); ?></span>
                                </td>
                                <!-- Actions -->
                                <td class="py-4 text-right">
                                    <a href="wishlist.php?remove=<?= $id; ?>" 
                                       class="text-red-500 hover:underline mr-4">Remove</a>
                                    <button class="bg-black text-white py-2 px-4 rounded hover:bg-gray-800">
                                        Add to Cart
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <p class="text-gray-600 text-lg mb-4">Your wishlist is empty.</p>
                <a href="index.php" class="text-blue-500 hover:underline">Start Shopping</a>
            </div>
        <?php endif; ?>

        <!-- Back to Home -->
        <div class="mt-8">
            <a href="index.php" class="text-blue-500 hover:underline text-lg">← Back to Home</a>
        </div>
    </div>
</body>
</html>
