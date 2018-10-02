<!DOCTYPE html>
<html>

<head>
<title>editCompanyForm</title>


<script>
/*

*	File:			editCompanyForm.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script takes the choice from editCompany.php
	It then sends the results to updateCompany.php
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


	$ID = $_GET["ID"];
	echo '<br>'.$ID;


{	// select previous data to show for editing	
	
	$sql = "SELECT * FROM tCompany WHERE ID=".$ID.";";
	$result = pg_query($conn, $sql);


	if ($result) {
	
		$row = pg_fetch_assoc($result);
	 
		echo' 
			 <div class="container">
		  <h2>Basic List Group</h2>   	
		  
			<form action="updateCompany.php" name="editCompanyFrom" method="post">
			
				<div class="form-group">
			    <input type="text" class="form-control" id="ID" name="ID" value="'.$row["id"].'" hidden>
			  </div>
			
				<div class="form-group">
			    <label for="preName">pre Name:</label>
			    <input type="text" class="form-control" id="preName" name="preName" value="'.$row["prename"].'">
			  </div>
			  
			  <div class="form-group">
		 		<label for="Name">Name:</label>
			    <input type="text" class="form-control" id="Name" name="Name" value="'.$row["name"].'">
			  </div>
				
			  <div class="form-group">
				<label for="RegType">Reg Type:</label>
			    <input type="text" class="form-control" id="RegType" name="RegType" value="'.$row["regtype"].'">
			  </div>
			  
			  <div class="form-group">
			  <label for="StreetA">Address:</label>
			    <input type="text" class="form-control" id="StreetA" name="StreetA" value="'.$row["streeta"].'">
			  </div>
			  
			  <div class="form-group">
			    <input type="text" class="form-control" id="StreetB" name="StreetB" value="'.$row["streetb"].'">
			  </div>
			  
				<div class="form-group">
			    <input type="text" class="form-control" id="StreetC" name="StreetC" value="'.$row["streetc"].'">
			  </div>
		
				<div class="form-group">
			  <label for="City">City:</label>
			    <input type="text" class="form-control" id="City" name="City" value="'.$row["city"].'">
			  </div>
		
				<div class="form-group">
			  <label for="Region">Region:</label>
			    <input type="text" class="form-control" id="Region" name="Region" value="'.$row["region"].'">
			  </div>
			  
			  <div class="form-group">
			  <label for="Postcode">Postcode:</label>
			    <input type="text" class="form-control" id="Postcode" name="Postcode" value="'.$row["postcode"].'">
			  </div>
			  
			  <div class="form-group">
			  <label for="Country">Country:</label>
			    <input type="text" class="form-control" id="Country" name="Country" value="'.$row["country"].'">
			  </div>
			 
		
			  <button type="submit" class="btn btn-primary">Update Company Info</button>
			</form>    
			
			</div>		    
		';    
		 
	    
	} else {
	    echo "0 results";
	}
	
	
	/*
	$sql = "SELECT * FROM Orders LIMIT 30";
	$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
	
	// WHERE tCompany.ID IS NULL
	// WHERE tCompany.ID = 1 OR 
		WHERE tCompany.NAME = "Pie Company"
	// ORDER BY LastName ASC , FirstName ASC
	*/


}



pg_close($conn);
?>



<br><hr><br>

<a href="createCompany.php">Register another Company</a>
<br>
<a href="index.php"> Quit to index page</a>


</body>
</html>