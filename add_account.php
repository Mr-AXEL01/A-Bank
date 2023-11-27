<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Account</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_accounts.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_POST['user_id'];
        $rib = $_POST['rib'];
        $balance = $_POST['balance'];
        $currency = $_POST['currency'];
        $action = $_POST['action'];

        createAccount($user_id, $rib, $balance, $currency, $action);

        header("Location: accounts.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Add Account</h2>
        <form method="post" action="">
            <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
            <input type="number" name="user_id" id="user_id" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="rib" class="block text-sm font-medium text-gray-700 mt-4">RIB</label>
            <input type="text" name="rib" id="rib" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="balance" class="block text-sm font-medium text-gray-700 mt-4">Balance</label>
            <input type="text" name="balance" id="balance" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="currency" class="block text-sm font-medium text-gray-700 mt-4">Currency</label>
            <input type="text" name="currency" id="currency" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="action" class="block text-sm font-medium text-gray-700 mt-4">Action</label>
            <input type="text" name="action" id="action" class="mt-1 p-2 border rounded-md w-full" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add Account</button>
        </form>
    </div>
</body>
</html>
