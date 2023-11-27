<?php

include_once 'db_connection.php';

function createRole($name) {
    global $conn;
    $query = "INSERT INTO role (name) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    return $stmt->execute();
}

function getAllRoles(){
    global $conn;
    $query = "SELECT * FROM role";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

