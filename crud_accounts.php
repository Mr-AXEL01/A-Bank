<?php

include_once 'db_connection.php';

function createAccount($userId, $rib, $balance, $currency, $action) {
    global $conn;
    $query = "INSERT INTO accounts (user_id, rib, balance, currency, action) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isds", $userId, $rib, $balance, $currency, $action);
    return $stmt->execute();
}

function getAllAccounts() {
    global $conn;
    $query = "SELECT * FROM accounts";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateAccount($accountId, $userId, $rib, $balance, $currency, $action) {
    global $conn;
    $query = "UPDATE accounts SET user_id=?, rib=?, balance=?, currency=?, action=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isdsdi", $userId, $rib, $balance, $currency, $action, $accountId);
    return $stmt->execute();
}

function deleteAccount($accountId) {
    global $conn;
    $query = "DELETE FROM accounts WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $accountId);
    return $stmt->execute();
}

?>
