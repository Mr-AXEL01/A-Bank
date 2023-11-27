<?php

include_once 'db_connection.php';

function createRole($name) {
    global $conn;
    $query = "INSERT INTO role (name) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    return $stmt->execute();
}