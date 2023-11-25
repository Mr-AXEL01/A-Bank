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

$bankTable = "
CREATE TABLE IF NOT EXITS banks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    logo VARCHAR(200),
    CONSTRAINT unique_bank_name UNIQUE (name)
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
    name VARCHAR(200) NOT NULL,
    longitude DECIMAL(10, 8) NOT NULL,
    latitude DECIMAL(10, 8) NOT NULL,
    adress_id INT,
    CONSTRAINT fk_agency_bank
);
";

$distibutorTable = "
CREATE TABLE IF NOT EXITS sistributors (
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

$accountTable = "
CREATE TABLE IFNOT EXISTS accounts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    CONSTRAINT fk_account_user FOREIGN KEY (user_id) REFERENCES users(id)
);
";

$transactionTable = "
CREATE TABLE IF NOT EXISTS transactions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    account_id INT,
    amount DECIMAL(10, 2) NOT NULL,
    CONSTRAINT fk_transaction_account FOREIGN KEY (account_id) REFERENCES accounts(id)
);
";



?>