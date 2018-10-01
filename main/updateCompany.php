<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			updateCompany.php
*	By:			Roy Canseco
*	Date:			27 Sep 2018	
*
*	This script takes the edits from editCompanyForm.php and saves it to the DB
*
*=====================================
*/
</script>



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



	$ID = $_POST["ID"];
	$preName = $_POST["preName"];
	$Name = $_POST["Name"];
	$RegType = $_POST["RegType"];
	$StreetA= $_POST["StreetA"];
	$StreetB = $_POST["StreetB"];
	$StreetC= $_POST["StreetC"];
	$City= $_POST["City"];
	$Region = $_POST["Region"];
	$Postcode= $_POST["Postcode"];
	$Country= $_POST["Country"];
	



$sql = "

		UPDATE `tcompany` SET `preName`='$preName',`Name`='$Name',
			`RegType`='$RegType',`StreetA`='$StreetA',`StreetB`='$StreetB',
			`StreetC`='$StreetC',`City`='$City',`Region`='$Region',
			`Postcode`='$Postcode',
			`Country`='$Country' WHERE ID= '$ID' ;

";


if ($conn->query($sql) === TRUE) {
    echo "<br> Record in table tCompany updated successfully";
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





$conn->close();



?>

<br><hr><br>

<a href="createCompany.php">Register another Company</a>
<br>
<a href="index.php"> Quit to index page</a>

</body>
</html>