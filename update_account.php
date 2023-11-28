<?php
include_once 'crud_accounts.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account_id = $_POST['account_id'];
    $new_user_id = $_POST['new_user_id'];
    $new_rib = $_POST['new_rib'];
    $new_balance = $_POST['new_balance'];
    $new_currency = $_POST['new_currency'];
    $new_action = $_POST['new_action'];

    updateAccount($account_id, $new_user_id, $new_rib, $new_balance, $new_currency, $new_action);

    header("Location: accounts.php");
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $account_id = $_GET['id'];
    $account = getAccountById($account_id);

    if (!$account) {
        header('Location: accounts.php');
        exit();
    }

    $new_user_id = $account['user_id'];
    $new_rib = $account['rib'];
    $new_balance = $account['balance'];
    $new_currency = $account['currency'];
    $new_action = $account['action'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Account</title>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-4">Update Account</h1>
    
        <?php if (isset($error)): ?>
            <div class="text-red-500 mb-4"><?= $error ?></div>
        <?php endif; ?>
    
        <form action="" method="post">
            <input type="hidden" name="account_id" value="<?= $account_id ?>">
            
            <div class="mb-4">
                <label for="new_user_id" class="block text-gray-700">New User ID:</label>
                <input type="number" name="new_user_id" id="new_user_id" class="border border-gray-300 p-2 w-full" value="<?= $new_user_id ?>" required>
            </div>
            <div class="mb-4">
                <label for="new_rib" class="block text-gray-700">New RIB:</label>
                <input type="text" name="new_rib" id="new_rib" class="border border-gray-300 p-2 w-full" value="<?= $new_rib ?>" required>
            </div>
            <div class="mb-4">
                <label for="new_balance" class="block text-gray-700">New Balance:</label>
                <input type="text" name="new_balance" id="new_balance" class="border border-gray-300 p-2 w-full" value="<?= $new_balance ?>" required>
            </div>
            <div class="mb-4">
                <label for="new_currency" class="block text-gray-700">New Currency:</label>
                <input type="text" name="new_currency" id="new_currency" class="border border-gray-300 p-2 w-full" value="<?= $new_currency ?>" required>
            </div>
            <div class="mb-4">
                <label for="new_action" class="block text-gray-700">New Action:</label>
                <input type="text" name="new_action" id="new_action" class="border border-gray-300 p-2 w-full" value="<?= $new_action ?>" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4">Update Account</button>
                <a href="accounts.php" class="ml-2 text-gray-500">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
