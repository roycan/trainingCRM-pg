<script>
/*

*	File:			newTableField.php
*	By:			Roy Canseco
*	Date:			27 Sep 2018	
*
*	This script alters the tPerson table to a Tel field
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



    
$sql = "ALTER TABLE tPerson MODIFY Tel VARCHAR(20);  ";

if ($conn->query($sql) === TRUE) {
    echo "<br> Table tPerson altered successfully";
} else {
    echo "<br> Error updating record: " . $conn->error;
}

/*
ALTER TABLE tPerson DROP Tel ;
	
// ALTER TABLE table_name ADD column_name datatype;
// ALTER TABLE table_name MODIFY COLUMN column_name datatype;
*/


$conn->close();



?>