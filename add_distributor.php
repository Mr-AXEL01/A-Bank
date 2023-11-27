<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Distributor</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_distributors.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bank_id = $_POST['bank_id'];
        $name = $_POST['name'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $address_id = $_POST['address_id'];

        createDistributor($bank_id, $name, $longitude, $latitude, $address_id);

        header("Location: distributors.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Add Distributor</h2>
        <form method="post" action="">
            <label for="bank_id" class="block text-sm font-medium text-gray-700">Bank ID</label>
            <input type="number" name="bank_id" id="bank_id" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="name" class="block text-sm font-medium text-gray-700 mt-4">Distributor Name</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="longitude" class="block text-sm font-medium text-gray-700 mt-4">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="latitude" class="block text-sm font-medium text-gray-700 mt-4">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="address_id" class="block text-sm font-medium text-gray-700 mt-4">Address ID</label>
            <input type="number" name="address_id" id="address_id" class="mt-1 p-2 border rounded-md w-full" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add Distributor</button>
        </form>
    </div>
</body>
</html>
