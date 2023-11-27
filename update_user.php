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
?>