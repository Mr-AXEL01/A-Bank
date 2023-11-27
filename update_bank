<?php
include_once 'crud_banks.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $bankId = $_POST['bank_id'];
    $newName = $_POST['new_name']; 
    $newLogo = $_POST['new_logo']; 

    updateBank($bankId, $newName, $newLogo);
}

header("Location: banks.php");
exit();
?>