<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Delete Distributor</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_distributors.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $distributor_id = $_POST['distributor_id'];

        deleteDistributor($distributor_id);

        header("Location: distributors.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <p class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to delete this distributor?</p>
        <form method="post" action="">
            <input type="hidden" name="distributor_id" value="<?= $_POST['distributor_id'] ?>">

            <button type="submit" class="bg-red-500 text-white p-2 rounded-md">Yes, Delete Distributor</button>
        </form>
    </div>
</body>
</html>
