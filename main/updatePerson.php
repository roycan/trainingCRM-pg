<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			updatePerson.php
*	By:			Roy Canseco
*	Date:			28 Sep 2018	
*
*	This script saves the data from editPerson.php 
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

{	// Create connection
   $host        = "host=localhost ";
   $port        = "port = 5432";
   $creds 		 = "user=postgres password=pass";
   $dbname 		 = "dbname = alphacrm";



	$conn = pg_connect("$host $port $creds $dbname");
	
	// Check connection
	if ( !($conn) ) {
	    die("<br>  Connection failed " );
	} else {
		echo "<br>  Connected successfully";
	}
	
}




////////////////////////////////

{ 	// update person's details

	$ID = $_POST["ID"];	
	$Salutation = $_POST["Salutation"];
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Tel = $_POST["Tel"];
	$CompanyID = $_POST["CompanyID"];
	$email = $_POST["email"];


	$sql = "UPDATE tPerson SET 

			Salutation='$Salutation' ,
			FirstName='$FirstName' ,
			LastName='$LastName' ,
			Tel='$Tel' ,
			CompanyID='$CompanyID',
			email='$email'
	
		WHERE id=$ID;";
		

	if (pg_query($conn, $sql) == TRUE) {
	    echo "<br> Record in table tPerson updated successfully";
	} else {
	    echo "<br> Error updating record: " . pg_last_error($conn);
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

}



echo '<br>'.$sql;


pg_close($conn);



?>



<br><hr><br>

<a href="selectCompany.php">View another Company</a>
<br>
<a href="index.php"> Quit to index page</a>


</body>
</html>