<?php
include_once 'crud_banks.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bank_id = $_POST['bank_id'];
    $new_name = $_POST['new_name'];
    $new_logo = $_POST['new_logo'];

    updateBank($bank_id, $new_name, $new_logo);

    header("Location: banks.php");
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $bank_id = $_GET['id'];
    $bank = getBankById($bank_id);

    if (!$bank) {
        header('Location: banks.php');
        exit();
    }

    $new_name = $bank['name'];
    $new_logo = $bank['logo'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Bank</title>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-4">Update Bank</h1>
    
        <?php if (isset($error)): ?>
            <div class="text-red-500 mb-4"><?= $error ?></div>
        <?php endif; ?>
    
        <form action="" method="post">
            <input type="hidden" name="bank_id" value="<?= $bank_id ?>">
            
            <div class="mb-4">
                <label for="new_name" class="block text-gray-700">New Bank Name:</label>
                <input type="text" name="new_name" id="new_name" class="border border-gray-300 p-2 w-full" value="<?= $new_name ?>" required>
            </div>
            <div class="mb-4">
                <label for="new_logo" class="block text-gray-700">New Logo URL:</label>
                <input type="text" name="new_logo" id="new_logo" class="border border-gray-300 p-2 w-full" value="<?= $new_logo ?>" required>
            </div>
            
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4">Update Bank</button>
                <a href="banks.php" class="ml-2 text-gray-500">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
