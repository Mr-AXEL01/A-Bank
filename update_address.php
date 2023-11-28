<?php
include_once 'crud_addresses.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $addressId = $_POST['address_id'];
    $newCity = $_POST['new_city'];
    $newDistrict = $_POST['new_district'];
    $newStreet = $_POST['new_street'];
    $newPostalCode = $_POST['new_postal_code'];
    $newEmail = $_POST['new_email'];
    $newPhone = $_POST['new_phone'];

    if (!empty($addressId) && !empty($newCity) && !empty($newDistrict) && !empty($newStreet) && !empty($newPostalCode) && !empty($newEmail) && !empty($newPhone)) {
        updateAddress($addressId, $newCity, $newDistrict, $newStreet, $newPostalCode, $newEmail, $newPhone);
        header("Location: addresses.php");
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $addressId = $_GET['address_id'];
    $address = getAddressById($addressId);

    if (!$address) {
        header("Location: addresses.php");
        exit();
    }
} else {
    header("Location: addresses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Address</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Update Address</h2>
        <form method="post" action="">
            <input type="hidden" name="address_id" value="<?= $addressId ?>">
            
            <label for="new_city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" name="new_city" id="new_city" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['city'] ?>" required>

            <label for="new_district" class="block text-sm font-medium text-gray-700 mt-4">District</label>
            <input type="text" name="new_district" id="new_district" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['district'] ?>" required>

            <label for="new_street" class="block text-sm font-medium text-gray-700 mt-4">Street</label>
            <input type="text" name="new_street" id="new_street" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['street'] ?>" required>

            <label for="new_postal_code" class="block text-sm font-medium text-gray-700 mt-4">Postal Code</label>
            <input type="text" name="new_postal_code" id="new_postal_code" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['postalCode'] ?>" required>

            <label for="new_email" class="block text-sm font-medium text-gray-700 mt-4">Email</label>
            <input type="text" name="new_email" id="new_email" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['email'] ?>" required>

            <label for="new_phone" class="block text-sm font-medium text-gray-700 mt-4">Phone</label>
            <input type="text" name="new_phone" id="new_phone" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['phone'] ?>" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Update Address</button>
        </form>
    </div>
</body>
</html>
