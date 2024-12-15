<?php
// Database configuration
$servername = "localhost:4306";
$username = "root";
$password = "";
$dbname = "user_database"; // Replace with your database name

// Check if the user is logged in
// Retrieve the logged-in user's ID from the session
$user_id = 13; // Replace this with session user ID

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    // Handle image upload
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Create directory if it doesn't exist
    }

    $images = basename($_FILES["images"]["name"]);
    $target_file = $target_dir . $images;

    // Check file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType !== "jpeg" && $imageFileType !== "jpg") {
        echo "<p style='color: red;'>Only JPEG images are allowed.</p>";
    } elseif (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
        // Insert data into the database
        $sql = "INSERT INTO products (user_id, price, images, description, title, category, date_posted) 
                VALUES ('$user_id', '$price', '$images', '$description', '$title', '$category', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>New product added successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color: red;'>Sorry, there was an error uploading your file.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #555;
        }
        input, textarea, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #4CAF50;
        }
        button {
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-button {
            background-color: #555;
            margin-top: 10px;
        }
        .back-button:hover {
            background-color: #444;
        }
        .form-footer {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add a New Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="title">Product Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter product title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" placeholder="Enter product description"></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Enter price" step="0.01" required>

            <label for="images">Image (JPEG only):</label>
            <input type="file" id="images" name="images" accept="image/jpeg" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="RARE">RARE</option>
                <option value="NORMAL">NORMAL</option>
                <option value="LUXURY">LUXURY</option>
            </select>

            <button type="submit">Add Product</button>
        </form>
        <button class="back-button" onclick="window.location.href='profile.php';">Back to Profile</button>
        <div class="form-footer">
            <p>Manage your products easily with our tool!</p>
        </div>
    </div>
</body>
</html>
