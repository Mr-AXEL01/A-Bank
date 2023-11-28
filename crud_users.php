<?php

include_once 'db_connection.php';

function createUser($username, $password, $addressId) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password, address_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $username, $hashedPassword, $addressId);

    return $stmt->execute();
}

function getAllUsers() {
    global $conn;
    $query = "SELECT * FROM users";
    $result = $conn->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateUser($userId, $newUsername, $newPassword, $newAddressId) {
    global $conn;
    $query = "UPDATE users SET username=?, PASSWORD=?, address_id=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $newUsername, $newPassword, $newAddressId, $userId);
    return $stmt->execute();
}

function deleteUser($userId){
    global $conn;
    $query = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    return $stmt->execute();
}

if (!function_exists('getUserDetails')) {
    function getUserDetails($userId) {
        global $conn;

        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>