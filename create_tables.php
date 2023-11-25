<?php

include_once "db_connection.php";

$userTable = "
CREATE TABLE IF NOT EXISTS users  (
    id INT PRIMARY KEY AUTO_INCREAMENT,
    username VARCHAR(200) NOT NULL,
    PASSWORD VARCHAR(255) NOT NULL,
    address_id INT,
    CONSTRAINT unique_username UNIQUE (username),
    CONSTRAINT fk_user_address FOREIGN KEY (address_id) REFERENCES addresses(id)
);
";

$roleTable = "
CREATE TABLE IF NOT EXISTS roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    CONSTRAINT unique_role_name UNIQUE (name)
);
";

$userRoleTable = "
CREATE TABLE IF NOT EXISTS user_roles (
    user_id INT,
    role_id INT,
    PRIMARY KEY (user_id, role_id),
    CONSTRAINT fk_user_roles_user FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_user_roles_role FOREIGN KEY (role_id) REFERENCES roles(id)
);
";

?>