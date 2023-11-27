<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Bank</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_banks.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bank_id = $_POST['bank_id'];
        $new_name = $_POST['new_name'];
        $new_logo = $_POST['new_logo'];

        updateBank($bank_id, $new_name, $new_logo);
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <form method="post" action="">
            <input type="hidden" name="bank_id" value="<?= $_POST['bank_id'] ?>">

            <label for="new_name" class="block text-sm font-medium text-gray-700">New Bank Name</label>
            <input type="text" name="new_name" id="new_name" class="mt-1 p-2 border rounded-md w-full">

            <label for="new_logo" class="block text-sm font-medium text-gray-700 mt-4">New Bank Logo</label>
            <input type="text" name="new_logo" id="new_logo" class="mt-1 p-2 border rounded-md w-full">

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Update Bank</button>
        </form>
    </div>
</body>
</html>