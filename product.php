<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost:4306";
$username = "root";
$password = "";
$database = "user_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

// Get the product ID from the URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);

if ($result === false) {
    die("SQL Query failed: " . $conn->error);
}

// Fetch the product data
$product = $result->fetch_assoc();

if (!$product) {
    die("Product not found.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($product['title']); ?></title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
            width: 100%;
            height: 100vh;
            background-image: url('product.jpg');
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
    .product-container {
        max-width: 1200px;
        margin: 20px auto;
        display: flex;
        background: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        overflow: hidden;
    }
    .product-image {
    flex: 1;
    background: #f4f4f4;
    padding: 3px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.product-image img {
    max-width: 99%;
    max-height: 99%;
    object-fit: contain; /* Ensures the image maintains its aspect ratio */
    border-radius: 10px; /* Optional: Add rounded corners for a polished look */
}

    
    .product-details {
        flex: 1;
        padding: 40px;
    }
    .product-details h1 {
        font-size: 36px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
    }
    .product-details h2 {
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 20px;
        color: #e67e22;
    }
    .product-details p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .buttons {
        margin-top: 20px;
    }
    .add-to-cart {
        background: #f39c12;
        color: white;
        padding: 12px 25px;
        border: none;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        text-transform: uppercase;
        transition:  0.3s ease;
    }
    .add-to-cart:hover {
        background: #e67e22;
    }
    .back-link {
        margin-left: 15px;
        color: #3498db;
        font-size: 16px;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .back-link:hover {
        color: #2980b9;
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

  <!-- Product Details Section -->
  <div class="product-container">
    <!-- Product Image -->
    <div class="product-image">
      <img src="images/<?php echo htmlspecialchars($product['images']); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>">
    </div>

    <!-- Product Details -->
    <div class="product-details">
    <h1><?php echo htmlspecialchars($product['title']); ?></h1>
    <h2>€<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
    <div class="buttons">
        <!-- Add to Cart Button -->
        <button class="add-to-cart bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition"
                onclick="addToCart(<?php echo $product['id']; ?>, '<?php echo htmlspecialchars($product['title']); ?>', <?php echo $product['price']; ?>)">
            Add to Cart
        </button>
        <!-- Back to HOME Button -->
        <a href="index.php" class="back-link bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">Back to HOME</a>
    </div>
    <!-- Done Message -->
    <p id="done-message" class="text-green-500 mt-4 hidden">Done! The product has been added to your cart.</p>
</div>

<script>
    function addToCart(id, title, price) {
        // Simulate adding the product to the cart (could be an AJAX call in a full implementation)
        console.log(`Product added to cart: ID=${id}, Title=${title}, Price=${price}`);

        // Show the "Done" message
        const doneMessage = document.getElementById('done-message');
        doneMessage.classList.remove('hidden');
        doneMessage.textContent = 'Done! The product has been added to your cart.';

        // Optionally hide the message after a few seconds
        setTimeout(() => {
            doneMessage.classList.add('hidden');
        }, 3000);
    }
</script>

</div>

    </div>
  </div>
</body>
</html>
