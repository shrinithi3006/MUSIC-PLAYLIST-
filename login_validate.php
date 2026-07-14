<?php
session_start();
$conn = new mysqli("localhost", "root", "", "music_app");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Validation (server-side fallback)
if (!preg_match("/^[a-zA-Z0-9]{4,}$/", $username) || strlen($password) < 8) {
    die("Invalid input.");
}

// Optional: Password hashing (recommended)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user into table
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
