<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			listCompany.php
*	By:			Roy Canseco
*	Date:			29 Sep 2018
*
*	This script lists companies and links to their company page.
*
*=====================================
*/

</script>

<title> listCompany.php </title>

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


$sql = "SELECT ID, preName, Name FROM tCompany
			ORDER BY Name";
$result = $conn->query($sql);



{ //create table from DB results

if ($result->num_rows > 0) {

	echo'
		<div class="container">
		  <h2>List of Companies</h2>
		  <ul class="list-group">
	';    
    
    
    // output data of each row
    $i = 1;
    while($row = $result->fetch_assoc()) {
        echo '<li class="list-group-item">'.$i.' <a href="listPeople.php?ID='.$row["ID"].'"
        	  >'.$row["preName"].' '.$row["Name"].'</a></li>';
			$i++;	    
    }
    echo "
	     </ul>
		</div>   
   ";
    



    
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