<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Delete Bank</title>
</head>
<body class="bg-gray-100 p-8">
<?php
    include_once 'crud_banks.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bank_id = $_POST['bank_id'];

        deleteBank($bank_id);
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <p class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to delete this bank?</p>
        <form method="post" action="">
            <input type="hidden" name="bank_id" value="<?= $_POST['bank_id'] ?>">

            <button type="submit" class="bg-red-500 text-white p-2 rounded-md">Yes, Delete Bank</button>
        </form>
    </div>
</body>
</html>