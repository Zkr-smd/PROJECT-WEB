<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: account.html");
    exit;
}

$user = $_SESSION['user'];

// Database connection
$servername = "localhost:4306";
$username = "root";
$password = "";
$dbname = "user_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user ID
$user_id = 10;

// Handle product edit form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_product_id'])) {
    $edit_product_id = $_POST['edit_product_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $update_sql = "UPDATE products SET title = ?, description = ?, price = ?, category = ? WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssdssi", $title, $description, $price, $category, $edit_product_id, $user_id);

    if ($stmt->execute()) {
        $success_message = "Product updated successfully!";
    } else {
        $error_message = "Error updating product.";
    }
}

// Fetch products posted by the user
$product_sql = "SELECT * FROM products WHERE user_id = ?";
$stmt = $conn->prepare($product_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$products_result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        nbody {
            width: 100%;
            height: 100vh;
            background: linear-gradient(to left, 
    rgb(152, 168, 235), /* Blue */
    rgb(240, 240, 220)   /* Brown */
);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
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
        .container {
            display: flex;
            width: 100%;
            height: 100vh;
        }
        .left {
            width: 70%;
            padding: 20px;
            background: rgb(240, 240, 220); /* A slightly muted red-orange tone */
            overflow-y: auto;
        }
        .right {
            width: 30%;
            background: rgb(240, 240, 220); /* A soft neutral beige-gray */
            box-shadow: -2px 0 5px rgba(255, 0, 0, 0.1);
            padding: 20px;
            overflow-y: auto;
        }
        .profile-details h2, .profile-details p {
            margin: 5px 0;
        }
        .products-section {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table th {
            background-color: #007BFF;
            color: white;
        }
        .edit-form {
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            font-size: 14px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 10px;
            font-weight: bold;
        }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<nbody>
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

    <div class="container">
        <!-- Left Section -->
        <div class="left">
            <!-- Profile Details -->
            <div class="profile-details">
                <h2>Welcome, <?php echo htmlspecialchars($user['fname'] . ' ' . $user['lname']); ?>!</h2>
                <p><strong>last name:</strong> <?php echo htmlspecialchars($user['fname'] ?? 'Unknown'); ?></p>
                <p><strong>first name:</strong> <?php echo htmlspecialchars($user['lname'] ?? 'Unknown'); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($user['status'] ?? 'Active'); ?></p>
            </div>

            <!-- User's Posted Products -->
            <div class="products-section">
                <h2>Your Posted Products</h2>
                <?php if (isset($success_message)) echo "<p class='message success'>$success_message</p>"; ?>
                <?php if (isset($error_message)) echo "<p class='message error'>$error_message</p>"; ?>
                <?php if ($products_result->num_rows > 0): ?>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        <?php while ($product = $products_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product['title']); ?></td>
                                <td>€<?php echo htmlspecialchars($product['price']); ?></td>
                                <td><?php echo htmlspecialchars($product['category']); ?></td>
                                <td>
                                    <form method="POST" class="edit-form">
                                        <input type="hidden" name="edit_product_id" value="<?php echo $product['id']; ?>">
                                        <input type="text" name="title" value="<?php echo htmlspecialchars($product['title']); ?>" required>
                                        <textarea name="description" rows="2"><?php echo htmlspecialchars($product['description']); ?></textarea>
                                        <input type="number" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
                                        <select name="category">
                                            <option value="RARE" <?php if ($product['category'] === 'RARE') echo 'selected'; ?>>RARE</option>
                                            <option value="NORMAL" <?php if ($product['category'] === 'NORMAL') echo 'selected'; ?>>NORMAL</option>
                                            <option value="LUXURY" <?php if ($product['category'] === 'LUXURY') echo 'selected'; ?>>LUXURY</option>
                                        </select>
                                        <button type="submit">Update</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php else: ?>
                    <p>You haven't posted any products yet.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right Section: Chat Application -->
        <div class="right">
            <h2>Chat Application</h2>
            <?php include 'users.php'; ?>
        </div>
    </div>


    
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
