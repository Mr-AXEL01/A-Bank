<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Agency</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_agencies.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $agency_id = $_POST['agency_id'];
        $new_name = $_POST['new_name'];
        $new_longitude = $_POST['new_longitude'];
        $new_latitude = $_POST['new_latitude'];
        $new_address_id = $_POST['new_address_id'];

        updateAgency($agency_id, $new_name, $new_longitude, $new_latitude, $new_address_id);

        header("Location: agencies.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Update Agency</h2>
        <form method="post" action="">
            <input type="hidden" name="agency_id" value="<?= $_POST['agency_id'] ?>">

            <label for="new_name" class="block text-sm font-medium text-gray-700">New Agency Name</label>
            <input type="text" name="new_name" id="new_name" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['agency_name'] ?>" required>

            <label for="new_longitude" class="block text-sm font-medium text-gray-700 mt-4">New Longitude</label>
            <input type="text" name="new_longitude" id="new_longitude" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['agency_longitude'] ?>" required>

            <label for="new_latitude" class="block text-sm font-medium text-gray-700 mt-4">New Latitude</label>
            <input type="text" name="new_latitude" id="new_latitude" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['agency_latitude'] ?>" required>

            <label for="new_address_id" class="block text-sm font-medium text-gray-700 mt-4">New Address ID</label>
            <input type="number" name="new_address_id" id="new_address_id" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['agency_address_id'] ?>" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Update Agency</button>
        </form>
    </div>
</body>
</html>
