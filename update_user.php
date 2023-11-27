<?php
include_once 'db_connection.php';
include_once "crud_user.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])){
    $userId = $GET['id'];

    $user = getUserById($userId);
}
?>