<script>
/*

*	File:			deleteRow_company.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script*
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



// sql to delete a record
$sql = "DELETE FROM companyTable WHERE id=33";

if ($conn->query($sql) === TRUE) {
    echo "<br>  Table companyTable record(s) deleted successfully";
} else {
    echo "<br> Error deleting record: " . $conn->error;
}





$conn->close();



?>