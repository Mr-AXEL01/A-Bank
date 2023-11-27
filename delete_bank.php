<?php
include_once 'crud_banks.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bankId = $_POST['bank_id'];

    deleteBank($bankId);
}

header("Location: banks.php");
exit();
?>