<!DOCTYPE html>
<html>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>

<body>



<script>
/*

*	File:			selectRow_person.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script selects data from the person table of the alphaCRM database
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



$sql = "SELECT  salutation, firstname, lastname, tCompany.Name FROM tPerson
		LEFT JOIN tCompany ON tPerson.companyID = tCompany.id
		WHERE tCompany.Name = 'Pie Company'
		ORDER BY LastName ASC, FirstName ASC		
		";
$result = $conn->query($sql);

$i=1;
if ($result->num_rows > 0) {
    echo "<table class=table> 
    			<tr>
    				<th>ID</th>
    				<th>Salutation</th>
    				<th>First Name</th>
    				<th>Last Name</th>
    				<th>Company ID</th>
    			</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        			<td>".$i." -</td>
        			<td>".$row["salutation"]."</td> 
        			<td>".$row["firstname"]." </td>
        			<td>".$row["lastname"]." </td>
        			<td>[Company ".$row["Name"]."]</td>
        		</tr>";
        	$i++;
    }
    echo "</table>";
} else {
    echo "0 results";
}




$conn->close();



?>


</body>
</html>
