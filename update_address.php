<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Address</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_addresses.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $addressId = $_POST['address_id'];
        $newCity = $_POST['city'];
        $newDistrict = $_POST['district'];
        $newStreet = $_POST['street'];
        $newPostalCode = $_POST['postal_code'];
        $newEmail = $_POST['email'];
        $newPhone = $_POST['phone'];

        updateAddress($addressId, $newCity, $newDistrict, $newStreet, $newPostalCode, $newEmail, $newPhone);

        header("Location: addresses.php");
        exit();
    } else {
        $addressId = $_GET['address_id'];
        $address = getAddressById($addressId);
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Update Address</h2>
        <form method="post" action="">
            <input type="hidden" name="address_id" value="<?= $addressId ?>">

            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" name="city" id="city" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['city'] ?>" required>

            <label for="district" class="block text-sm font-medium text-gray-700 mt-4">District</label>
            <input type="text" name="district" id="district" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['district'] ?>" required>

            <label for="street" class="block text-sm font-medium text-gray-700 mt-4">Street</label>
            <input type="text" name="street" id="street" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['street'] ?>" required>

            <label for="postal_code" class="block text-sm font-medium text-gray-700 mt-4">Postal Code</label>
            <input type="text" name="postal_code" id="postal_code" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['postal_code'] ?>" required>

            <label for="email" class="block text-sm font-medium text-gray-700 mt-4">Email</label>
            <input type="email" name="email" id="email" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['email'] ?>" required>

            <label for="phone" class="block text-sm font-medium text-gray-700 mt-4">Phone</label>
            <input type="tel" name="phone" id="phone" class="mt-1 p-2 border rounded-md w-full" value="<?= $address['phone'] ?>" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Update Address</button>
        </form>
    </div>
</body>
</html>
