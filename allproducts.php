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

// Fetch products based on category
$category = isset($_GET['category']) ? htmlspecialchars($_GET['category'], ENT_QUOTES, 'UTF-8') : null;

$sql = "SELECT * FROM products";
if ($category) {
    $sql .= " WHERE category = '" . $conn->real_escape_string($category) . "'";
}

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
  <title>Products - <?= $category ? ucfirst($category) : 'All' ?></title>
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
            
            background: linear-gradient(to bottom, 
    rgb(135, 206, 235) 0%,   /* Sky Blue */
    rgb(245, 245, 245) 50%,  /* Light Gray */
    rgb(255, 165, 0) 100%    /* Vibrant Orange */
);

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
<body class="bg-gray-100">
  <section class="py-12">
    <div class="p-6 mx-auto lg:max-w-7xl sm:max-w-full">
      <h2 class="text-4xl font-extrabold text-gray-800 mb-8 text-center">
        <?= $category ? ucfirst($category) . ' Products' : 'All Products' ?>
      </h2>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <a href="product.php?id=<?php echo $row['id']; ?>" class="bg-white rounded-2xl p-5 shadow hover:shadow-lg transition-all relative block">
              <div
                class="bg-gray-200 w-10 h-10 flex items-center justify-center rounded-full absolute top-4 right-4 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" class="fill-gray-800 inline-block" viewBox="0 0 64 64">
                  <path
                    d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                    data-original="#000000"></path>
                </svg>
              </div>
              <div class="w-full h-48 overflow-hidden flex justify-center items-center">
                <img src="images/<?php echo htmlspecialchars($row['images']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="object-contain h-full w-full" />
              </div>
              <div class="mt-4 text-center">
                <h3 class="text-lg font-extrabold text-gray-800"><?php echo htmlspecialchars($row['title']); ?></h3>
                <p class="text-gray-600 text-sm mt-2"><?php echo htmlspecialchars(substr($row['description'], 0, 50)) . '...'; ?></p>
                <h4 class="text-lg text-gray-800 font-bold mt-4">€<?php echo htmlspecialchars($row['price']); ?></h4>
                <span class="block mt-2 text-sm text-gray-500 font-medium"><?php echo htmlspecialchars($row['category']); ?></span>
              </div>
            </a>
          <?php endwhile; ?>
        <?php else: ?>
          <p class="col-span-full text-center text-gray-600">No products found for this category!</p>
        <?php endif; ?>
      </div>
      
      <div class="mt-8 text-center">
        <a href="index.php" class="px-6 py-3 bg-gray-600 text-white text-lg font-bold rounded-md hover:bg-gray-700 transition-all">
          Back to Home
        </a>
      </div>
    </div>
  </section>
</body>
</html>

<?php
$conn->close();
?>
