<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			savePerson.php
*	By:			Roy Canseco
*	Date:			02 Oct 2018	
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


	$Salutation = $_POST["Salutation"];
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Tel = $_POST["Tel"];
	$CompanyID = $_POST["CompanyID"];
	$email = $_POST["email"];




{	// sql insert into table
		$sql = "INSERT INTO tperson (salutation, FirstName, LastName, tel, CompanyID , email) 
					VALUES ('$Salutation', '$FirstName', '$LastName', '$Tel', '$CompanyID' , '$email');";
		
		if (pg_query($conn, $sql) == TRUE) {
		    echo "<br> Data for Table tPerson inserted successfully";
		} else {
		    echo "<br> Error inserting to table: " . pg_last_error($conn);
		}

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