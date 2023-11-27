<?php
include_once 'db_connection.php';
include_once 'crud_users.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];

    deleteUser($userId);

    header('Location: users.php'); 
    exit();
} else {
    header('Location: users.php');
    exit();
}
?>