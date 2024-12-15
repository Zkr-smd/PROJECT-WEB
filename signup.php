<?php
session_start(); // Start session to track user info

// Database connection
$conn = new mysqli('localhost:4306', 'root', '', 'user_database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the sign-up process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate password length
    if (strlen($password) < 10) {
        echo "<script>alert('Password must be at least 10 characters long.'); window.location.href='account.html';</script>";
    } else {
        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Generate a unique ID
        $unique_id = rand(100000, 999999); // Random 6-digit number for unique_id
        $img = 'default.jpg'; // Default profile image
        $status = 'active'; // Default status for new users

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (user_id, unique_id, fname, lname, email, password, img, status) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $unique_id, $fname, $lname, $email, $hashed_password, $img, $status);

        if ($stmt->execute()) {
            // Store user info in session
            $_SESSION['user'] = [
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
            ];

            // Redirect to the index page
            header("Location: index.php");
            exit;
        } else {
            // Handle duplicate email error
            echo "<script>alert('Error: Email already exists or another issue occurred.'); window.location.href='account.html';</script>";
        }

        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
