<?php

include_once 'db_connection.php';

function createUser($username,$password,$addressId){
    global $conn;
    $query = "INSERT INTO users (username, PASSWORD, address_id) VALUES (? , ? , ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $username, $password, $addressId);
    return $stmt->execute();
}

function getAllUsers(){
    global $conn;
    $query = "SELECT * FROM users"
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

