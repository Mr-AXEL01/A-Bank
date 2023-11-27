<?php
include_once 'db_connection.php';
include_once 'crud_users.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $addressId = $_POST['address_id'];

    if(createUser($username, $password, $addressId)){
        echo "User created successfully";
    }else{
        echo "Failed to add user";
    }
}
?>
