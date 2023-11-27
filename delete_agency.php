<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Delete Agency</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_agencies.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $agency_id = $_POST['agency_id'];

        deleteAgency($agency_id);

        header("Location: agencies.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <p class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to delete this agency?</p>
        <form method="post" action="">
            <input type="hidden" name="agency_id" value="<?= $_POST['agency_id'] ?>">

            <button type="submit" class="bg-red-500 text-white p-2 rounded-md">Yes, Delete Agency</button>
        </form>
    </div>
</body>
</html>
