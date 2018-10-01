<script>
/*

*	File:			createTable_person.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script creates the person table for alphaCRM
*
*=====================================
*/
</script>


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
$sql = "CREATE TABLE personTable (
	id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	Salutation VARCHAR(20) ,	
	FirstName VARCHAR(50) ,
	LastName VARCHAR(50) NOT NULL,
	CompanyID INT(11) NOT NULL ,
	reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "<br> Table personTable created successfully";
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