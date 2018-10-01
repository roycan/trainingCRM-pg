<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			listPeople.php
*	By:			Roy Canseco
*	Date:			27 Sep 2018	
*
*	This script shows company details and lists its employees
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

echo "<hr>";

////////////////////////////////////////////

// list company information

echo '<center>';
$ID = $_GET["ID"];


$sql = "SELECT  * FROM tCompany WHERE ID=".$ID.";" ;
$result = $conn->query($sql);


if ($result->num_rows > 0) {
	
	 $row = $result->fetch_assoc() ;
	 
	
    echo "<h2>".$row["preName"]." ".$row["Name"]."</h2>";
    echo "".$row["RegType"]."<br>";
    echo "".$row["StreetA"]." ".$row["StreetB"]." ".$row["StreetC"]."<br>";
    echo "".$row["City"]." ".$row["Region"]."<br>";
	 echo "".$row["Postcode"]." ".$row["Country"]."<hr>";
	
	
} else {
    echo "0 results";
}

echo '</center>';

/////////////////////////////////////////////////////

// list company personnel


$sql = "SELECT * FROM tPerson WHERE CompanyID=".$ID.";";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
	
	echo '
		<div class="container">
		  <h4>Basic List Group</h4>
		  <ul class="list-group">
	';

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='editPerson.php?ID=".$row["ID"]."'><li class='list-group-item'>".$row["Salutation"]." ".
        		$row["FirstName"]." ".$row["LastName"]." </li></a> ";
    }
    
    
	echo '    
		  </ul>
		</div>
	';    
    
    
} else {
    echo "0 results";
}


$conn->close();



///////////////////////////////////////////////////

// add button to create a new person

echo'

		<div class="container">
		 
		<form action="createPerson.php?CompanyID='.$ID.'" name="addPersonForm" method="post">
		
		
		  <button type="submit" class="btn btn-primary">Add a new Person</button>
		</form>
		
		</div>
';



?>

<br><hr><br>

<a href="selectCompany.php">View another Company</a>
<br>
<a href="index.php"> Quit to index page</a>



</body>
</html>