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

// Fetch up to 8 products
$sql = "SELECT * FROM products LIMIT 8";
$result = $conn->query($sql);

if ($result === false) {
    die("SQL Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Products</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
  <section class="py-12">
    <div class="p-6 mx-auto max-w-full">
      
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <!-- Wrap the product in a clickable link -->
            <a href="product.php?id=<?php echo $row['id']; ?>" class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-all relative block">
              <!-- Heart Icon Form -->
              <form action="wishlist.php" method="GET" style="position: absolute; top: 1rem; right: 1rem;">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="title" value="<?php echo htmlspecialchars($row['title']); ?>">
    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
    <input type="hidden" name="image" value="<?php echo htmlspecialchars($row['images']); ?>">

    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;" title="Add to Wishlist">
        <div class="bg-gray-200 w-10 h-10 flex items-center justify-center rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="16px" class="fill-gray-800 inline-block" viewBox="0 0 64 64">
                <path
                    d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                    data-original="#000000"></path>
            </svg>
        </div>
    </button>
</form>


              <!-- Product Image -->
              <div class="w-full h-56 overflow-hidden flex justify-center items-center">
                <img src="images/<?php echo htmlspecialchars($row['images']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="object-cover h-full w-full" />
              </div>
              <!-- Product Details -->
              <div class="p-4 text-center">
                <h3 class="text-md font-semibold text-gray-800"><?php echo htmlspecialchars($row['title']); ?></h3>
                <p class="text-sm text-gray-600 mt-1"><?php echo htmlspecialchars(substr($row['description'], 0, 50)) . '...'; ?></p>
                <h4 class="text-lg text-gray-800 font-bold mt-2">€<?php echo htmlspecialchars($row['price']); ?></h4>
              </div>
            </a>
          <?php endwhile; ?>
        <?php else: ?>
          <p class="col-span-full text-center text-gray-600">No products found!</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</body>
</html>

<?php
$conn->close();
?>
