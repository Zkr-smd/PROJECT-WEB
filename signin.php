<?php
session_start(); // Start session to track user info

// Database connection
$conn = new mysqli('localhost:4306', 'root', '', 'user_database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the sign-in process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user info in session
            $_SESSION['user'] = [
                'fname' => $user['fname'],
                'lname' => $user['lname'],
                'email' => $user['email'],
                'status' => $user['status'], // Optionally store the user's status
            ];

            // Debugging (Optional)
            // var_dump($_SESSION['user']);
            // exit;

            // Redirect to the index page
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Invalid password.'); window.location.href='account.html';</script>";
        }
    } else {
        echo "<script>alert('No user found with this email.'); window.location.href='account.html';</script>";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
