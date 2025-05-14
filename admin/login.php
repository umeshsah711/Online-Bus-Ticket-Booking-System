<?php
// login.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection code here
    // Make sure to connect to your database using mysqli or PDO

    // For simplicity, I'll use mysqli in this example
    $conn = new mysqli('localhost', 'root', '', 'test');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query the users table to check if the username and password are valid
    $query = "SELECT * FROM admin_users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        // Successful login, redirect to admin dashboard
        header('Location: admin_dashboard.php');
        exit;
    } else {
        // Invalid credentials, show an error message or redirect back to login page
        echo '<script>alert("Invalid credentials. Please try again.");window.location.href = "index.php";</script>';
    }

    $conn->close();
}
?>
