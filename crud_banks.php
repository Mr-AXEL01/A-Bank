<?php

include_once 'db_connection.php';

function createBank($name, $logo = null)
{
    global $conn;
    $query = "INSERT INTO banks (name, logo) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $name, $logo);
    return $stmt->execute();
}

function getAllBanks() {
    global $conn;
    $query = "SELECT * FROM banks";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateBank($bankId, $newName, $newLogo) {
    global $conn;
    $query = "UPDATE banks SET name=?, logo=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $newName, $newLogo, $bankId);
    return $stmt->execute();
}

function deleteBank($bankId) {
    global $conn;
    $query = "DELETE FROM banks WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bankId);
    return $stmt->execute();
}

?>