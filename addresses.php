<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Addresses</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_addresses.php';

    $addresses = getAllAddresses();
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Addresses</h2>
        <ul>
            <?php foreach ($addresses as $address): ?>
                <li class="mb-2"><?= $address['city'] ?>, <?= $address['district'] ?>, <?= $address['street'] ?>
                    <a href="update_address.php?address_id=<?= $address['id'] ?>&address_city=<?= $address['city'] ?>&address_district=<?= $address['district'] ?>&address_street=<?= $address['street'] ?>&address_postal_code=<?= $address['postal_code'] ?>&address_email=<?= $address['email'] ?>&address_phone=<?= $address['phone'] ?>" class="text-blue-500 ml-2">Update</a>
                    <a href="delete_address.php?address_id=<?= $address['id'] ?>" class="text-red-500 ml-2">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="add_address.php" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add New Address</a>
    </div>
</body>
</html>
