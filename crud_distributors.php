<?php

include_once 'db_connection.php';

function createDistributor($name, $longitude, $latitude, $address_id) {
    global $conn;
    $query = "INSERT INTO distributors (name, longitude, latitude, address_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $name, $longitude, $latitude, $address_id);
    return $stmt->execute();
}

function getAllDistributors() {
    global $conn;
    $query = "SELECT * FROM distributors";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateDistributor($distributor_id, $new_name, $new_longitude, $new_latitude, $new_address_id) {
    global $conn;
    $query = "UPDATE distributors SET name=?, longitude=?, latitude=?, address_id=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $new_name, $new_longitude, $new_latitude, $new_address_id, $distributor_id);
    return $stmt->execute();
}

function deleteDistributor($distributor_id) {
    global $conn;
    $query = "DELETE FROM distributors WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $distributor_id);
    return $stmt->execute();
}

?>
