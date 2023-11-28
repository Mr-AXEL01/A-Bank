<?php
include_once 'db_connection.php';
include_once 'crud_transactions.php';

$transactions = getAllTransactions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Transactions</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="bg-gray-800 text-white w-1/5">
        <div class="p-4">
            <h1 class="text-2xl font-semibold">Navigation</h1>
            <ul class="mt-4">
                <li><a href="banks.php" class="text-blue-300 hover:text-blue-500">Banks</a></li>
                <li><a href="agencies.php" class="text-blue-300 hover:text-blue-500">Agencies</a></li>
                <li><a href="addresses.php" class="text-blue-300 hover:text-blue-500">Addresses</a></li>
                <!-- Add links for other pages -->
            </ul>
        </div>
    </div>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Transactions</h2>

        <ul>
            <?php foreach ($transactions as $transaction): ?>
                <li class="mb-2">
                    User ID: <?= $transaction['user_id'] ?>, 
                    Account ID: <?= $transaction['account_id'] ?>, 
                    Type: <?= $transaction['transaction_type'] ?>, 
                    Amount: <?= $transaction['amount'] ?>
                    <a href="update_transaction.php?id=<?= $transaction['id'] ?>&user_id=<?= $transaction['user_id'] ?>&account_id=<?= $transaction['account_id'] ?>&transaction_type=<?= $transaction['transaction_type'] ?>&amount=<?= $transaction['amount'] ?>" class="text-blue-500 ml-2">Update</a>
                    <a href="delete_transaction.php?id=<?= $transaction['id'] ?>" class="text-red-500 ml-2">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="add_transaction.php" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add New Transaction</a>
    </div>
</body>
</html>
