<?php
include_once 'crud_addresses.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $addressId = $_GET['address_id'];

    if (!empty($addressId)) {
        deleteAddress($addressId);
    }
}

header("Location: addresses.php");
exit();
?>
