<?php
include_once 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
}
?>