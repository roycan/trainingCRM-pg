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


<div class="container">

<h2> Add new Person </h2>  
<form action="savePerson.php" name="formPerson" method="post">


<?php

{  //  connect to database 

		
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
$conn->close();
?>
  
  
  
  <div class="form-group">
    <label for="FirstName">First Name:</label>
    <input type="text" class="form-control" id="FirstName" name="FirstName" value="" >
  </div>
  
  <div class="form-group">
    <label for="LastName">Last Name:</label>
    <input type="text" class="form-control" id="LastName" name="LastName" value="" required>
  </div>
  
  <div class="form-group">
    <label for="Tel">Telephone:</label>
    <input type="number" class="form-control" id="Tel" name="Tel" 
    	data-bv-integer-message="Please enter a valid phone number." >
  </div>
  
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email"
    	input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
  </div>
  
  
  
<?php  

$CompanyID = $_GET["CompanyID"];

echo'  
  <div class="form-group">
    <input type="number" class="form-control" id="CompanyID" name="CompanyID" value="'.$CompanyID.'" hidden>
  </div>
';
?>

  <button type="Add Person" class="btn btn-primary">Submit</button>
</form>

</div>




<br><hr><br>

<a href="selectCompany.php">View another Company</a>
<br>
<a href="index.php"> Quit to index page</a>



</body>
</html>

