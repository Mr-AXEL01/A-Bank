<?php

include_once 'db_connection.php';

function createAccount($userId, $balance) {
    global $conn;
    $query = "INSERT INTO accounts (user_id, balance) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("id", $userId, $balance);
    return $stmt->execute();
}

function getAllAccounts() {
    global $conn;
    $query = "SELECT * FROM accounts";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateAccount($accountId, $newUserId, $newBalance) {
    global $conn;
    $query = "UPDATE accounts SET user_id=?, balance=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("idi", $newUserId, $newBalance, $accountId);
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
