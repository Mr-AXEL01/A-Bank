
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
    CONSTRAIT fk_agency_bank FOREIGN KEY (bank_id) REFERENCES banks(id),
    CONSTRAINT fk_agency_address FOREIGN KEY (address_id) REFERENCES (addresses_id)
);
";

$distributorTable = "
CREATE TABLE IF NOT EXISTS distributors (
    id INT PRIMARY KEY AUTO_INCREMENT,
    bank_id INT,
    name VARCHAR(200) NOT NULL,
    longitude DECIMAL(10, 8) NOT NULL,
    latitude DECIMAL(10, 8) NOT NULL,
    address_id INT,
    CONSTRAINT fk_distributor_bank FOREIGN KEY (bank_id) REFERENCES banks(id),
    CONSTRAINT fk_distributor_address FOREIGN KEY (address_id) REFERENCES addresses(ID)
);
";

$addressTable = "
CREATE TABLE IF NOT EXISTS address (
    id INT PRIMARY KEY AUTO_INCREMENT,
    city VARCHAR(200) NOT NULL,
    district VARCHAR(200) NOT NULL,
    street VARCHAR(200) NOT NULL,
    postalCode VARCHAR(10) NOT NULL,
    email VARCHAR(200),
    phone VARCHAR20
);
";

try{
    $conn->exec($userTable);
    $conn->exec($roleTable);
    $conn->exec($bankTable);
    $conn->exec($agencyTable);
    $conn->exec($distributorTable);
    $conn->exec($addressTable);

    echo "Tables created successfully.";
}catch (PDOException $e){
    echo "failed to create tables" . $e->getMessage();
}

?>