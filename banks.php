<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Banks</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_banks.php';

    $banks = getAllBanks();
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Banks</h2>
        <ul>
            <?php foreach ($banks as $bank): ?>
                <li class="mb-2"><?= $bank['name'] ?>
                    <!-- Add links to update and delete the bank -->
                    <a href="update_bank.php?bank_id=<?= $bank['id'] ?>&bank_name=<?= $bank['name'] ?>&bank_logo=<?= $bank['logo'] ?>" class="text-blue-500 ml-2">Update</a>
                    <a href="delete_bank.php?bank_id=<?= $bank['id'] ?>" class="text-red-500 ml-2">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="add_bank.php" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add New Bank</a>
    </div>
</body>
</html>
