<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_banks.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $logo = $_POST['logo'];
        createBank($name, $logo);
    }

    $banks = getAllBanks();
    ?>

    
</body>
</html>