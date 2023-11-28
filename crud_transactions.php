<?php

include_once 'db_connection.php';

function createTransaction($accountId, $type, $targetAccountId, $amount, $action) {
    global $conn;
    $query = "INSERT INTO transactions (account_id, type, target_account_id, amount, action) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isds", $accountId, $type, $targetAccountId, $amount, $action);
    return $stmt->execute();
}

function getAllTransactions() {
    global $conn;
    $query = "SELECT * FROM transactions";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateTransaction($transactionId, $accountId, $type, $targetAccountId, $amount, $action) {
    global $conn;
    $query = "UPDATE transactions SET account_id=?, type=?, target_account_id=?, amount=?, action=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isdsdi", $accountId, $type, $targetAccountId, $amount, $action, $transactionId);
    return $stmt->execute();
}

function deleteTransaction($transactionId) {
    global $conn;
    $query = "DELETE FROM transactions WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $transactionId);
    return $stmt->execute();
}

if (!function_exists('getRecentTransactions')) {
    function getRecentTransactions($userId, $limit = 5) {
        global $conn;
        $query = "SELECT * FROM transactions WHERE account_id IN 
                    (SELECT id FROM accounts WHERE user_id = ?)
                  ORDER BY id DESC LIMIT ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $userId, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }
    }
}

?>
