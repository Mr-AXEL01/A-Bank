<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Account</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_accounts.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $account_id = $_POST['account_id'];
        $new_rib = $_POST['new_rib'];
        $new_balance = $_POST['new_balance'];
        $new_currency = $_POST['new_currency'];
        $new_action = $_POST['new_action'];

        updateAccount($account_id, $new_rib, $new_balance, $new_currency, $new_action);

        header("Location: accounts.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Update Account</h2>
        <form method="post" action="">
            <input type="hidden" name="account_id" value="<?= $_POST['account_id'] ?>">

            <label for="new_rib" class="block text-sm font-medium text-gray-700">New RIB</label>
            <input type="text" name="new_rib" id="new_rib" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['account_rib'] ?>" required>

            <label for="new_balance" class="block text-sm font-medium text-gray-700 mt-4">New Balance</label>
            <input type="text" name="new_balance" id="new_balance" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['account_balance'] ?>" required>

            <label for="new_currency" class="block text-sm font-medium text-gray-700 mt-4">New Currency</label>
            <input type="text" name="new_currency" id="new_currency" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['account_currency'] ?>" required>

            <label for="new_action" class="block text-sm font-medium text-gray-700 mt-4">New Action</label>
            <input type="text" name="new_action" id="new_action" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['account_action'] ?>" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Update Account</button>
        </form>
    </div>
</body>
</html>
