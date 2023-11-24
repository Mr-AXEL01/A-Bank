
<?php
include_once 'db_connection.php';

#let's start creation of tables :

$userTable = "
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO _INCREMENT,
    username VARCHAR(200) NOT NULL,
    PASSWORD VARCHAR(200) NOT NULL,
    CONSTRAINT unique_username UNIQUE (username)
);
";

?>