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
        $account_id = $_POST['account_id'];
        $type = $_POST['type'];
        $target_account_id = $_POST['target_account_id'];
        $amount = $_POST['amount'];
        $action = $_POST['action'];

        createTransaction($account_id, $type, $target_account_id, $amount, $action);

        header("Location: transactions.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Add Transaction</h2>
        <form method="post" action="">
            <label for="account_id" class="block text-sm font-medium text-gray-700">Account ID</label>
            <input type="number" name="account_id" id="account_id" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="type" class="block text-sm font-medium text-gray-700 mt-4">Type</label>
            <select name="type" id="type" class="mt-1 p-2 border rounded-md w-full" required>
                <option value="credit">Credit</option>
                <option value="debit">Debit</option>
            </select>

            <label for="target_account_id" class="block text-sm font-medium text-gray-700 mt-4">Target Account ID</label>
            <input type="number" name="target_account_id" id="target_account_id" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="amount" class="block text-sm font-medium text-gray-700 mt-4">Amount</label>
            <input type="text" name="amount" id="amount" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="action" class="block text-sm font-medium text-gray-700 mt-4">Action</label>
            <input type="text" name="action" id="action" class="mt-1 p-2 border rounded-md w-full" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add Transaction</button>
        </form>
    </div>
</body>
</html>
