<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "alphaCRM";

// Create connection
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("<br> Connection failed: " . $conn->connect_error);
} 
echo "<br> Connected successfully";


// sql to create table
$sql = "CREATE TABLE companyTable (
	id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	preName VARCHAR(50) ,
	Name VARCHAR(250) NOT NULL,
	regType VARCHAR(50) NULL,
	reg_date TIMESTAMP,
	StreetA VARCHAR(150) NULL, 
	StreetB VARCHAR(150) NULL ,
	StreetC VARCHAR(150) NULL , 
	City VARCHAR(150) NULL ,
	Region VARCHAR(150) NULL,
	Postcode VARCHAR(50) NULL ,
	Country VARCHAR (250) NOT NULL
);";


if ($conn->query($sql) === TRUE) {
    echo "<br> Table companyTable created successfully";
} else {
    echo "<br> Error creating table: " . $conn->error;
}


/*
CREATE TABLE <databaseName>.<tableName>(
<fieldName> type (len) {NOT} NULL {AUTO_INCREMENT} PRIMARY KEY,
<fieldName> type (len) {NOT} NULL ,
<fieldName> type (len) {NOT} NULL ,
...
<fieldName> type (len) {NOT} NULL 
)


// {xxx} means xxx is optional
*/





$conn->close();



?>