<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			selectCompany.php
*	By:			Roy Canseco
*	Date:			27 Sep 2018	
*
*	This script chooses a company to display its info and personnel.
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

<h2>Select Company Page</h2>
<br>




<form action="listPeople.php" name="form1" method="post">
	<div class="container">



<?php

{	// connection script

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
// echo "<br> Connected successfully";

}		


$sql = "SELECT id, prename, name FROM tCompany
			ORDER BY name";
$result = $conn->query($sql);



{ //create dropdown from DB results

if ($result->num_rows > 0) {

echo'
<div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Select Company
  </button>
  <div class="dropdown-menu">
';    
    
    
    // output data of each row
    $i = 1;
    while($row = $result->fetch_assoc()) {
        echo '<a class="dropdown-item" href="listPeople.php?ID='.$row["id"].'">'.$i.' '.$row["prename"].' '.$row["name"].'</a>';
			$i++;	    
    }
    echo "</table>";
} else {
    echo "0 results";
}


echo'
  </div>
</div>

';


}



$conn->close();
?>

	
	</div>
</form>	






<br><hr><br>


<a href="index.php"> Quit to index page</a>



</body>
</html>