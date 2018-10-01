<script>
/*

*	File:			updateTable_company.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script updates specific values in the company table of alphaCRM
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


$sql = "UPDATE companyTable SET country='United Kingdom' WHERE country='UK'";

if ($conn->query($sql) === TRUE) {
    echo "<br> Record in table companyTable updated successfully";
} else {
    echo "<br> Error updating record: " . $conn->error;
}

/*
UPDATE <tableName> SET
	fieldA = 'valueA' ,
	fieldB = 'valueB' ,
	fieldC = 'valueC' 
WHERE 
	fieldX <operator> 'valueX'
	
	
// operator can  = or < or >	
*/


// sql to delete a record
$sql = "DELETE FROM companyTable WHERE id=29";

if ($conn->query($sql) === TRUE) {
    echo "<br>  Table companyTable record(s) deleted successfully";
} else {
    echo "<br> Error deleting record: " . $conn->error;
}








$conn->close();



?>
