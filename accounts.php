<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Accounts</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_accounts.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $accounts = getAllAccounts();
    }
    ?>

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
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Accounts</h2>
        <ul>
            <?php foreach ($accounts as $account): ?>
                <li class="mb-2"><?= $account['rib'] ?>
                    <a href="update_account.php?account_id=<?= $account['id'] ?>&account_rib=<?= $account['rib'] ?>&account_balance=<?= $account['balance'] ?>&account_currency=<?= $account['currency'] ?>&account_action=<?= $account['action'] ?>" class="text-blue-500 ml-2">Update</a>
                    <a href="delete_account.php?account_id=<?= $account['id'] ?>" class="text-red-500 ml-2">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="add_account.php" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add New Account</a>
    </div>
</body>
</html>
