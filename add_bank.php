<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Bank</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_banks.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $logo = $_POST['logo'];

        createBank($name, $logo);

        header("Location: banks.php");
        exit();
    }
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <form method="post" action="">
            <label for="name" class="block text-sm font-medium text-gray-700">Bank Name</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full">

            <label for="logo" class="block text-sm font-medium text-gray-700 mt-4">Bank Logo</label>
            <input type="text" name="logo" id="logo" class="mt-1 p-2 border rounded-md w-full">

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Create Bank</button>
        </form>
    </div>
</body>
</html>