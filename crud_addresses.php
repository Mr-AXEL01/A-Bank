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

function updateAddress($addressId, $newCity, $newDistrict, $newStreet, $newPostalCode, $newEmail, $newPhone){
    global $conn;
    $query = "UPDATE addresses SET city=?, district=?, street=?, postalCode=?, email=?, phone=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $newCity, $newDistrict, $newStreet, $newPostalCode, $newEmail, $newPhone, $addressId);
    return $stmt->execute();
}

function deleteAddress($addressId){
    global $conn;
    $query = "DELETE FROM addresses WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_parmi("i", $addressId);
    return $stmt->execute();
}

?>