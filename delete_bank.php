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
    
</body>
</html>