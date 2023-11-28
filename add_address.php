<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Address</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_addresses.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $city = $_POST['city'];
        $district = $_POST['district'];
        $street = $_POST['street'];
        $postalCode = $_POST['postal_code'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        createAddress($city, $district, $street, $postalCode, $email, $phone);

        header("Location: addresses.php");
        exit();
    }
    ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Add Address</h2>
        <form method="post" action="">
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" name="city" id="city" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="district" class="block text-sm font-medium text-gray-700 mt-4">District</label>
            <input type="text" name="district" id="district" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="street" class="block text-sm font-medium text-gray-700 mt-4">Street</label>
            <input type="text" name="street" id="street" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="postal_code" class="block text-sm font-medium text-gray-700 mt-4">Postal Code</label>
            <input type="text" name="postal_code" id="postal_code" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="email" class="block text-sm font-medium text-gray-700 mt-4">Email</label>
            <input type="email" name="email" id="email" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="phone" class="block text-sm font-medium text-gray-700 mt-4">Phone</label>
            <input type="tel" name="phone" id="phone" class="mt-1 p-2 border rounded-md w-full" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add Address</button>
        </form>
    </div>
</body>
</html>
