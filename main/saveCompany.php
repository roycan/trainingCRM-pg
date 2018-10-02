<!DOCTYPE html>
<html>

<head>


<script>
/*

*	File:			saveCompany.php
*	By:			Roy Canseco
*	Date:			27 Sep 2018	
*
*	This script saves the data from createCompany.php to the database
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





{ //collect data with $_POST

	$preName = $_POST["preName"];
	$companyName = $_POST["companyName"];
	$regType = $_POST["regType"];
	$streetA  = $_POST["streetA"];
	$streetB  = $_POST["streetB"];
	$streetC  = $_POST["streetC"];
	$city = $_POST["city"];
	$region = $_POST["region"];
	$postalCode = $_POST["postalCode"];
	$country = $_POST["country"];


	echo "INSERT INTO `tcompany` ( `preName`, `Name`, `RegType`, `StreetA`, 
			`StreetB`, `StreetC`, `City`, `Region`, `Postcode`, `COUNTRY`) 
		VALUES ( '".$preName."', '".$companyName."', '".$regType."', '".$streetA.
			"', '".$streetB."', '".$streetC."', '".$city."', '".$region."', '".
			$postalCode."', '".$country."');";


}




{// sql insert into table
		$sql = "INSERT INTO tcompany ( prename, name, regtype, streeta, 
					streetb, streetc, city, region, postcode, country) 
				VALUES ( '".$preName."', '".$companyName."', '".$regType."', '".$streetA.
					"', '".$streetB."', '".$streetC."', '".$city."', '".$region."', '".
					$postalCode."', '".$country."');";
		
		if (pg_query($conn, $sql) == TRUE) {
		    echo "<br> Data for Table tCompany inserted successfully";
		} else {
		    echo "<br> Error inserting to table: " . pg_last_error($conn);
		}

}




pg_close($conn);
?>


<br><hr><br>

<a href="createCompany.php">Register another Company</a>
<br>
<a href="index.php"> Quit to index page</a>



</body>
</html>
