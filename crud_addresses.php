<?php

include_once 'db_connection.php';

function createAddress($city, $district, $street, $postalCode, $email, $phone) {
    global $conn;
    $query = "INSERT INTO addresses (city, district, street, postalCode, email, phone) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $city, $district, $street, $postalCode, $email, $phone);
    return $stmt->execute();
}

function getAllAddresses() {
    global $conn;
    $query = "SELECT * FROM addresses";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}



?>