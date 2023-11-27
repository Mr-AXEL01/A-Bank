<?php

include_once 'db_connection.php';

function createBank($name, $logo){
    global $conn;
    $query = "INSERT INTO banks (name, logo) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $name, $logo);
    return $stmt->execute();
}

?>