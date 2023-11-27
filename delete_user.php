<?php
include_once 'crud_users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];

    deleteUser($userId);

    header('Location: users.php');
    exit;
}
?>