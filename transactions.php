<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Transactions</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_transactions.php';

    $transactions = getAllTransactions();
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Transactions</h2>
        <ul>
            <?php foreach ($transactions as $transaction): ?>
                <li class="mb-2"><?= $transaction['id'] ?>
                    <a href="update_transaction.php?transaction_id=<?= $transaction['id'] ?>&type=<?= $transaction['type'] ?>&target_account_id=<?= $transaction['target_account_id'] ?>&amount=<?= $transaction['amount'] ?>&action=<?= $transaction['action'] ?>" class="text-blue-500 ml-2">Update</a>
                    <a href="delete_transaction.php?transaction_id=<?= $transaction['id'] ?>" class="text-red-500 ml-2">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="add_transaction.php" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add New Transaction</a>
    </div>
</body>
</html>
