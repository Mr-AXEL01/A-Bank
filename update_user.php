<?php
include_once 'db_connection.php';
include_once "crud_user.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];

    $user = getUserById($userId);

    if (!$user) {
        header('Location: users.php');
        exit();
    }
} else {
    header('Location: users.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];
    $newAddressId = $_POST['new_address_id'];

    if (!empty($newUsername) && !empty($newPassword) && !empty($newAddressId)) {
        if (updateUser($userId, $newUsername, $newPassword, $newAddressId)) {
            header('Location: users.php');
            exit();
        } else {
            $error = 'Failed to update the user.';
        }
    } else {
        $error = 'All fields are required.';
    }
}
?>