<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			savePerson.php
*	By:			Roy Canseco
*	Date:			28 Sep 2018	
*
*	This script saves the data from createPerson.php 
		to the tPerson table of alphaCRM
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



	$Salutation = $_POST["Salutation"];
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Tel = $_POST["Tel"];
	$CompanyID = $_POST["CompanyID"];
	$email = $_POST["email"];

// sql insert into table
// you can get an exact template for this from phpmyadmin
$sql = "INSERT INTO `tperson` (`Salutation`, `FirstName`, `LastName`, `Tel`, `CompanyID` , `email`) 
			VALUES ('$Salutation', '$FirstName', '$LastName', '$Tel', '$CompanyID' , '$email');";

if ($conn->query($sql) === TRUE) {
    echo "<br> Data for Table tPerson inserted successfully";
} else {
    echo "<br> Error inserting to table: " . $conn->error;
}

echo '<br>'.$sql;


$conn->close();



?>



<br><hr><br>

<a href="selectCompany.php">View another Company</a>
<br>
<a href="index.php"> Quit to index page</a>


</body>
</html>