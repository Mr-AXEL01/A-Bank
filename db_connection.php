<?php
$servername = "localhost";
$username = "root";
$password= "";
$databaseName = "A_Bank";
// $databaseName = "A_Bank";
$conn = new mysqli ($servername, $username, $password, $databaseName);

if ($conn->connect_error){
    die("Connection failed : " . $conn->connect_error);
}else{
    echo "Connected to the Database seccessfuly\n";
}
// let's create a new database
// $databaseName = "A_Bank";
// $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS $databaseName";
// if ($conn->query($sqlCreateDB) === TRUE){
//     echo "Database created successfully\n";
// }else{
//     echo "Error creating database : " . $conn->error;
// }

#select database 
// $conn->select_db($databaseName);

?>