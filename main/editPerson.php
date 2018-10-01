<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			createPerson.php
*	By:			Roy Canseco
*	Date:			28 Sep 2018	
*
*	This script is a form for adding a person to tPerson table.
	It will send the data to savePerson.php
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

///////////////////////////////////////////
{		// connect to database 

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


}


////////////////////////////////////////

{ // select the person's details 

$ID = $_GET["ID"];


$sql = "SELECT * FROM tPerson WHERE ID=$ID ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$Salutation= $row["Salutation"];
$FirstName=  $row["FirstName"];
$LastName=  $row["LastName"];
$CompanyID= $row["CompanyID"];
$Tel= $row["Tel"];
$email= $row["email"];

}



///////////////////////////////////////

{  	// place the details into the form values



echo' 

		<div class="container">
		
		<h2> Edit Person </h2>  
		<form action="updatePerson.php" name="formPerson" method="post">
		
		';		

		  

{  	// this is the dropdown for the salutation
		
		
		
				$sql = "SELECT * FROM tLookup WHERE lookupType='Salutation'
							ORDER BY lookupOrder ; ";
				$result = $conn->query($sql);
				
				
				if ($result->num_rows > 0) {
				
				
					echo'
						<div class="form-group">
						  <label for="Salutation">Select list:</label>
						  <select class="form-control" id="Salutation" name="Salutation" >
						  
							';			  
						  
						  
						  	while($row = $result->fetch_assoc()) {
						        echo '<option value='.$row["lookupValue"];
						        
						        		if($row["lookupValue"] == $Salutation) {
						        			echo ' selected ';
						        		}
						        
						        echo '>'.$row["lookupValue"].'</option>
						        ';
						    }
			
						    
						   echo' 
							  </select>
							</div>
						
					';		
							
				
				} else {
					    echo "0 results";
				}


}
	  
		  
		  
		 echo ' 
		  <div class="form-group">
		    <label for="FirstName">First Name:</label>
		    <input type="text" class="form-control" id="FirstName" name="FirstName" value="'.$FirstName.'" >
		  </div>
		  
		  <div class="form-group">
		    <label for="LastName">Last Name:</label>
		    <input type="text" class="form-control" id="LastName" name="LastName" value="'.$LastName.'" required>
		  </div>
		  
		  <div class="form-group">
		    <label for="Tel">Telephone:</label>
		    <input type="number" class="form-control" id="Tel" name="Tel"  value='.$Tel.'
		    	data-bv-integer-message="Please enter a valid phone number." >
		  </div>
		  
		  <div class="form-group">
		    <label for="email">Email:</label>
		    <input type="email" class="form-control" id="email" name="email"  value="'.$email.'
		    	" >
		  </div>
		  
			';
			
			

{  	// this is the dropdown for the salutation
		
		
				$sql = "SELECT  `ID` , `preName` , `Name` FROM tCompany 
							ORDER BY `Name` ASC ; ";
				$result = $conn->query($sql);
				
				
				if ($result->num_rows > 0) {
				
				
					echo'
						<div class="form-group">
						  <label for="CompanyID">Select Company:</label>
						  <select class="form-control" id="CompanyID" name="CompanyID" >
						  
							';			  
						  
						  
						  	while($row = $result->fetch_assoc()) {
						        echo '<option value='.$row["ID"];
						        
						        		if($row["ID"] == $CompanyID) {
						        			echo ' selected ';
						        		}
						        
						        echo '>'.$row["preName"]." ".$row["Name"].'</option>
						        ';
						    }
			
						    
						   echo' 
							  </select>
							</div>
						
					';		
							
				
				} else {
					    echo "0 results";
				}


}

			
			
		echo '			  
		  <div class="form-group">
		    <input type="number" class="form-control" id="ID" name="ID" value="'.$ID.'" hidden>
		  </div>
		
		
		
		  <button type="Add Person" class="btn btn-primary">Edit Person</button>
		</form>
		
		</div>
';


}



$conn->close();
?>





<br><hr><br>

<a href="selectCompany.php">View another Company</a>
<br>
<a href="index.php"> Quit to index page</a>

</body>
</html>

