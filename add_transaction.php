<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Transaction</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_transactions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_POST['user_id'];
        $account_id = $_POST['account_id'];
        $transaction_type = $_POST['transaction_type'];
        $amount = $_POST['amount'];

        createTransaction($user_id, $account_id, $transaction_type, $amount);

        header("Location: transactions.php");
        exit();
    }
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Add Transaction</h2>
        <form method="post" action="">
            <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
            <input type="number" name="user_id" id="user_id" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="account_id" class="block text-sm font-medium text-gray-700 mt-4">Account ID</label>
            <input type="number" name="account_id" id="account_id" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="transaction_type" class="block text-sm font-medium text-gray-700 mt-4">Transaction Type</label>
            <input type="text" name="transaction_type" id="transaction_type" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="amount" class="block text-sm font-medium text-gray-700 mt-4">Amount</label>
            <input type="text" name="amount" id="amount" class="mt-1 p-2 border rounded-md w-full" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add Transaction</button>
        </form>
    </div>
</body>
</html>
