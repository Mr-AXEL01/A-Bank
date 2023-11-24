
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

$roleTable = "
CREATE TABLE IF NOT EXISTS role (
    id INT PRIMARY KEY AUTO _INCREMENT,
    name VARCHAR(200) NOT NULL,
    CONSTRAINT unique_role_name UNIQUE (name)
);
";

$bankTable = "
CREATE TABLE IF NOT EXISTS banks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    logo VARCHAR(200),
    CONSTRAINT unique_bank_name UNIQUE (name)
);
";

$agencyTable = "
CREATE TABLE IF NOT EXISTS agencies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    bank_id INT,
    name VARCHAR(255) NOT NULL,
    longitude DECIMAL(10, 8) NOT NULL,
    latitude DECIMAL(10, 8) NOT NULL,
    address_id INT,
    CONSTRAIT fk_agency_bank FOREIGN KEY (bank_id) REFERENCES (bank_id),
    CONSTRAINT fk_agency_address FOREIGN KEY (address_id) REFERENCES (addresses_id)
);
";




?>