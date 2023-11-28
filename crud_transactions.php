<?php

include_once 'db_connection.php';

function createTransaction($user_id, $account_id, $transaction_type, $amount) {
    global $conn;
    $query = "INSERT INTO transactions (user_id, account_id, transaction_type, amount) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiis", $user_id, $account_id, $transaction_type, $amount);
    return $stmt->execute();
}

function getAllTransactions() {
    global $conn;
    $query = "SELECT * FROM transactions";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateTransaction($transaction_id, $newUserId, $newAccountId, $newTransactionType, $newAmount) {
    global $conn;
    $query = "UPDATE transactions SET user_id=?, account_id=?, transaction_type=?, amount=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiisi", $newUserId, $newAccountId, $newTransactionType, $newAmount, $transaction_id);
    return $stmt->execute();
}

function deleteTransaction($transaction_id) {
    global $conn;
    $query = "DELETE FROM transactions WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $transaction_id);
    return $stmt->execute();
}

function getRecentTransactions($user_id) {
    global $conn;
    $query = "SELECT * FROM transactions WHERE account_id = ? ORDER BY id DESC LIMIT 5";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

?>
