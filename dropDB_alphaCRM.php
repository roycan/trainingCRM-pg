
<?php

	
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("<br> Connection failed: " . $conn->connect_error);
} 
echo "<br> Connected successfully";

}
	
	
	
// sql to drop a database
$sql = "DROP DATABASE alphaCRM;";

if ($conn->query($sql) === TRUE) {
    echo "<br> Database alphaCRM dropped successfully";
} else {
    echo "<br> Error dropping table: " . $conn->error;




$conn->close();



?>