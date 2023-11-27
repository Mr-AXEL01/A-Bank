<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Transaction</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_transactions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $transaction_id = $_POST['transaction_id'];
        $new_type = $_POST['new_type'];
        $new_target_account_id = $_POST['new_target_account_id'];
        $new_amount = $_POST['new_amount'];
        $new_action = $_POST['new_action'];

        updateTransaction($transaction_id, $new_type, $new_target_account_id, $new_amount, $new_action);

        header("Location: transactions.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Update Transaction</h2>
        <form method="post" action="">
            <input type="hidden" name="transaction_id" value="<?= $_POST['transaction_id'] ?>">

            <label for="new_type" class="block text-sm font-medium text-gray-700">New Type</label>
            <select name="new_type" id="new_type" class="mt-1 p-2 border rounded-md w-full" required>
                <option value="credit">Credit</option>
                <option value="debit">Debit</option>
            </select>

            <label for="new_target_account_id" class="block text-sm font-medium text-gray-700 mt-4">New Target Account ID</label>
            <input type="number" name="new_target_account_id" id="new_target_account_id" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['target_account_id'] ?>" required>

            <label for="new_amount" class="block text-sm font-medium text-gray-700 mt-4">New Amount</label>
            <input type="text" name="new_amount" id="new_amount" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['amount'] ?>" required>

            <label for="new_action" class="block text-sm font-medium text-gray-700 mt-4">New Action</label>
            <input type="text" name="new_action" id="new_action" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['action'] ?>" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Update Transaction</button>
        </form>
    </div>
</body>
</html>
