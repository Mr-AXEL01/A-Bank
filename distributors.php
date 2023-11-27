<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Distributors</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_distributors.php';

    $distributors = getAllDistributors();
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Distributors</h2>
        <ul>
            <?php foreach ($distributors as $distributor): ?>
                <li class="mb-2"><?= $distributor['name'] ?>
                    <a href="update_distributor.php?distributor_id=<?= $distributor['id'] ?>&distributor_name=<?= $distributor['name'] ?>&distributor_longitude=<?= $distributor['longitude'] ?>&distributor_latitude=<?= $distributor['latitude'] ?>&distributor_address_id=<?= $distributor['address_id'] ?>" class="text-blue-500 ml-2">Update</a>
                    <a href="delete_distributor.php?distributor_id=<?= $distributor['id'] ?>" class="text-red-500 ml-2">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="add_distributor.php" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add New Distributor</a>
    </div>
</body>
</html>
