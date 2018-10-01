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



$ID = $_GET["ID"];
echo '<br>'.$ID;



$sql = "SELECT * FROM tCompany WHERE ID=".$ID.";";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
	
	$row = $result->fetch_assoc();
 
	echo' 
	 <div class="container">
  <h2>Basic List Group</h2>   	
  
	<form action="updateCompany.php" name="editCompanyFrom" method="post">
	
		<div class="form-group">
	    <input type="text" class="form-control" id="ID" name="ID" value="'.$row["ID"].'" hidden>
	  </div>
	
		<div class="form-group">
	    <label for="preName">pre Name:</label>
	    <input type="text" class="form-control" id="preName" name="preName" value="'.$row["preName"].'">
	  </div>
	  
	  <div class="form-group">
 		<label for="Name">Name:</label>
	    <input type="text" class="form-control" id="Name" name="Name" value="'.$row["Name"].'">
	  </div>
		
	  <div class="form-group">
		<label for="RegType">Reg Type:</label>
	    <input type="text" class="form-control" id="RegType" name="RegType" value="'.$row["RegType"].'">
	  </div>
	  
	  <div class="form-group">
	  <label for="StreetA">Address:</label>
	    <input type="text" class="form-control" id="StreetA" name="StreetA" value="'.$row["StreetA"].'">
	  </div>
	  
	  <div class="form-group">
	    <input type="text" class="form-control" id="StreetB" name="StreetB" value="'.$row["StreetB"].'">
	  </div>
	  
		<div class="form-group">
	    <input type="text" class="form-control" id="StreetC" name="StreetC" value="'.$row["StreetC"].'">
	  </div>

		<div class="form-group">
	  <label for="City">City:</label>
	    <input type="text" class="form-control" id="City" name="City" value="'.$row["City"].'">
	  </div>

		<div class="form-group">
	  <label for="Region">Region:</label>
	    <input type="text" class="form-control" id="Region" name="Region" value="'.$row["Region"].'">
	  </div>
	  
	  <div class="form-group">
	  <label for="Postcode">Postcode:</label>
	    <input type="text" class="form-control" id="Postcode" name="Postcode" value="'.$row["Postcode"].'">
	  </div>
	  
	  <div class="form-group">
	  <label for="Country">Country:</label>
	    <input type="text" class="form-control" id="Country" name="Country" value="'.$row["Country"].'">
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


$conn->close();



?>



<br><hr><br>

<a href="createCompany.php">Register another Company</a>
<br>
<a href="index.php"> Quit to index page</a>


</body>
</html>