<?php

include_once 'db_connection.php';

function createAgency($bank_id, $name, $longitude, $latitude, $address_id) {
    global $conn;
    $query = "INSERT INTO agencies (bank_id, name, longitude, latitude, address_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issii", $bank_id, $name, $longitude, $latitude, $address_id);
    return $stmt->execute();
}

function getAllAgencies() {
    global $conn;
    $query = "SELECT * FROM agencies";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateAgency($agency_id, $new_name, $new_longitude, $new_latitude, $new_address_id) {
    global $conn;
    $query = "UPDATE agencies SET name=?, longitude=?, latitude=?, address_id=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $new_name, $new_longitude, $new_latitude, $new_address_id, $agency_id);
    return $stmt->execute();
}

function deleteAgency($agency_id) {
    global $conn;
    $query = "DELETE FROM agencies WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $agency_id);
    return $stmt->execute();
}

?>
