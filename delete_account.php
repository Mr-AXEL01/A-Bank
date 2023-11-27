<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Delete Account</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_accounts.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $account_id = $_POST['account_id'];

        deleteAccount($account_id);

        header("Location: accounts.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <p class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to delete this account?</p>
        <form method="post" action="">
            <input type="hidden" name="account_id" value="<?= $_POST['account_id'] ?>">

            <button type="submit" class="bg-red-500 text-white p-2 rounded-md">Yes, Delete Account</button>
        </form>
    </div>
</body>
</html>
