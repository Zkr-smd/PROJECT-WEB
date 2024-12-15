<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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
            background-image: url('cart.AVIF');
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

    <!-- Cart Content -->
    <div class="max-w-4xl mx-auto p-6 mt-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Shopping Cart</h1>
        
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <table class="table-auto w-full bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4">Product</th>
                        <th class="py-2 px-4">Price</th>
                        <th class="py-2 px-4">Quantity</th>
                        <th class="py-2 px-4">Subtotal</th>
                        <th class="py-2 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $id => $item):
                        $title = isset($item['title']) ? $item['title'] : 'Unknown Product';
                        $price = isset($item['price']) ? $item['price'] : 0;
                        $quantity = isset($item['quantity']) ? $item['quantity'] : 0;
                        $subtotal = $price * $quantity;
                        $total += $subtotal;
                    ?>
                    <tr class="text-center border-b">
                        <td class="py-2 px-4"><?php echo htmlspecialchars($title); ?></td>
                        <td class="py-2 px-4">€<?php echo number_format($price, 2); ?></td>
                        <td class="py-2 px-4"><?php echo $quantity; ?></td>
                        <td class="py-2 px-4">€<?php echo number_format($subtotal, 2); ?></td>
                        <td class="py-2 px-4">
                            <a href="remove_from_cart.php?id=<?php echo $id; ?>" class="text-red-500 hover:underline">Remove</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="mt-6 flex justify-between items-center">
                <h2 class="text-xl font-bold">Total: €<?php echo number_format($total, 2); ?></h2>
                <a href="payment.html" class="px-6 py-2 bg-green-500 text-white font-bold rounded-md hover:bg-green-600">Checkout</a>
            </div>
        <?php else: ?>
            <p class="text-gray-600">Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>
