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
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $agency_id = $_GET['id'];
    $agency = getAgencyById($agency_id);

    if (!$agency) {
        header('Location: agencies.php');
        exit();
    }

    $new_name = $agency['name'];
    $new_longitude = $agency['longitude'];
    $new_latitude = $agency['latitude'];
    $new_address_id = $agency['address_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Agency</title>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-4">Update Agency</h1>
    
        <?php if (isset($error)): ?>
            <div class="text-red-500 mb-4"><?= $error ?></div>
        <?php endif; ?>
    
        <form action="" method="post">
            <input type="hidden" name="agency_id" value="<?= $agency_id ?>">
            
            <div class="mb-4">
                <label for="new_name" class="block text-gray-700">New Agency Name:</label>
                <input type="text" name="new_name" id="new_name" class="border border-gray-300 p-2 w-full" value="<?= $new_name ?>" required>
            </div>
            <div class="mb-4">
                <label for="new_longitude" class="block text-gray-700">New Longitude:</label>
                <input type="text" name="new_longitude" id="new_longitude" class="border border-gray-300 p-2 w-full" value="<?= $new_longitude ?>" required>
            </div>
            <div class="mb-4">
                <label for="new_latitude" class="block text-gray-700">New Latitude:</label>
                <input type="text" name="new_latitude" id="new_latitude" class="border border-gray-300 p-2 w-full" value="<?= $new_latitude ?>" required>
            </div>
            <div class="mb-4">
                <label for="new_address_id" class="block text-gray-700">New Address ID:</label>
                <input type="number" name="new_address_id" id="new_address_id" class="border border-gray-300 p-2 w-full" value="<?= $new_address_id ?>" required>
            </div>
            
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4">Update Agency</button>
                <a href="agencies.php" class="ml-2 text-gray-500">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
