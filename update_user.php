<?php
include_once "crud_user.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $userId =$_POST['user_id'];
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];
    $newAddressId = $_POST['new_address_id'];

    updateUser($userId, $newUsername, $newPassword, $newAddressId);

    header('Location: user.php');
    exit;
}
?>