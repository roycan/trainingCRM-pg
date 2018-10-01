<script>
/*

*	File:			createDB_alphaCRM.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script creates the database for AlphaCRM
*
*=====================================
*/
</script>


<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("<br>  Connection failed: " . $conn->connect_error);
} 
echo "<br>  Connected successfully";

// Create database
$sql = "CREATE DATABASE alphaCRM";
if ($conn->query($sql) === TRUE) {
    echo "<br> Database alphaCRM created successfully";
} else {
    echo "<br> Error creating database: " . $conn->error;
}




$conn->close();


?>