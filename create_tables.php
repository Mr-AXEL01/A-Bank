<?php

include_once "db_connection.php";

$roleTable = "
CREATE TABLE IF NOT EXISTS roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    CONSTRAINT unique_role_name UNIQUE (name)
);
";

$userTable = "
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(200) NOT NULL,
    PASSWORD VARCHAR(255) NOT NULL,
    role_id INT,
    address_id INT,
    CONSTRAINT unique_username UNIQUE (username),
    CONSTRAINT fk_user_role FOREIGN KEY (role_id) REFERENCES roles(id),
    CONSTRAINT fk_user_address FOREIGN KEY (address_id) REFERENCES addresses(id)
);
";

$addressTable = "
CREATE TABLE IF NOT EXISTS addresses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    city VARCHAR(200) NOT NULL,
    district VARCHAR(200) NOT NULL,
    street VARCHAR(200) NOT NULL,
    postaleCode VARCHAR(10) NOT NULL,
    email VARCHAR(200),
    phone VARCHAR(20)
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
    CONSTRAINT fk_agency_bank FOREIGN KEY (bank_id) REFERENCES banks(id),
    CONSTRAINT fk_agency_address FOREIGN KEY (address_id) REFERENCES addresses(id)
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
    CONSTRAINT fk_distributor_address FOREIGN KEY (address_id) REFERENCES addresses(id)
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

$accountTable = "
CREATE TABLE IF NOT EXISTS accounts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    rib VARCHAR(16) UNIQUE NOT NULL,
    balance DECIMAL(10, 2),
    currency VARCHAR(3),
    action VARCHAR(10),
    CONSTRAINT fk_account_user FOREIGN KEY (user_id) REFERENCES users(id)
);
";

$transactionTable = "
CREATE TABLE IF NOT EXISTS transactions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    account_id INT,
    type ENUM ('credit', 'debit') NOT NULL,
    target_account_id INT,
    amount DECIMAL(10, 2),
    action VARCHAR(10),
    CONSTRAINT fk_transaction_account FOREIGN KEY (account_id) REFERENCES accounts(id),
    CONSTRAINT fk_transaction_target_account FOREIGN KEY (target_account_id) REFERENCES accounts(id)
);
";

$permissionTable = "
CREATE TABLE IF NOT EXISTS permissions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    CONSTRAINT unique_permission_name UNIQUE (name)
);
";

try {
    $conn->query($roleTable);
    $conn->query($userTable);
    $conn->query($addressTable);
    $conn->query($agencyTable);
    $conn->query($distributorTable);
    $conn->query($bankTable);
    $conn->query($accountTable);
    $conn->query($transactionTable);
    $conn->query($permissionTable);

    echo "Tables created successfully.";
} catch (mysqli_sql_exception $e) {
    echo "Error creating tables: " . $e->getMessage();
}

$conn->close();
?>
