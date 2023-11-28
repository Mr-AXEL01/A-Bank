<?php
include_once 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $hashedPassword);
    
    if ($stmt->execute()) {
        
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>